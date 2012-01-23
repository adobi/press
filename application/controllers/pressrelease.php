<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Pressrelease extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Pressreleases', 'model');
        
        $data['items'] = $this->model->fetchAll();
        
        $this->template->build('pressrelease/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Pressreleases', 'model');
        
        $this->load->model('Defaults', 'defaults');
        $data['defaults'] = $this->defaults->find($this->defaults->getid());
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
            $this->load->model('Games', 'games');
            
            if ($item) {
                
                if ($item->game_id) {
                    
                    $game = $this->games->find($item->game_id);
                    
                    $item->game_name = $game->name;
                    $item->game_url = $game->url;
                } else {
                    $item->game_name = false;
                    $item->game_url = false;
                }
                
                $this->load->model('Stores', 'stores');
                
                $item->stores = $this->stores->fetchForPressRelease($id);
                
                $this->session->set_userdata('current_pressrelease', $id);
            } else {
                redirect(base_url().'dashboard');
            }
            
            
        } else {
            
            foreach ($data['defaults'] as $prop=>$val) {
                if ($prop !== 'id')
                    $insert[$prop] = $val;
            }
            $insert['active'] = 0;
            $insert['created'] = date('Y-m-d H:i:s', time());
            
            $inserted = $this->model->insert($insert);
            
            redirect(base_url().'pressrelease/edit/'.$inserted);
        }
        
        if ($_POST) {
            
            if ($this->upload->do_upload('logo')) {
                
                if ($id) {
                    
                    $this->_deleteImage($id);
                }
                
                $_POST['logo'] = $this->upload->file_name;
                unset($_POST['upload_logo']);
                $this->model->update($_POST, $id);
                
            }             
            redirect($_SERVER['HTTP_REFERER']);
        }
        

        if ($item->pack) {
            $item->size = round(@filesize(dirname($_SERVER['SCRIPT_FILENAME']) . '/uploads/original/'.$item->pack) / (1024*1024), 4);
        } else {
            $item->size = 0;
        }
        
        $data['item'] = $item;

        $this->template->build('pressrelease/edit', $data);
    }
    
    public function delete_image() 
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            
            $this->_deleteImage($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }     
    
    public function edit_section()
    {
        $data = array();
        
            
        $id = $this->session->userdata('current_pressrelease');

        $this->load->model('Pressreleases', 'model');
        
        $data['item'] = $this->model->find($id);
        
        if ($_POST) {
            
            $this->model->update($_POST, $id);
            
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        $this->template->build('pressrelease/edit_section', $data);
    }
    
    public function edit_pack()
    {
        $data = array();

        $this->template->set_partial('analytics', '_partials/analytics', array('prefix'=>'pack_'));
        

        $id = $this->session->userdata('current_pressrelease');

        $this->load->model('Pressreleases', 'model');
        
        $item = $this->model->find($id);
        
        if ($_POST) {
            
            $this->load->model('Pressreleases', 'model');

    	  	if ($this->upload->do_upload('pack')) {
    	  	    
    	  	    $this->load->config('upload');
    	  	    
    	  	    $data = $this->upload->data();
                
    	  	    if ($item->pack) {
    	  	        
                    unlink($this->config->item('upload_path') . $item->pack);
    	  	    }
                
                $this->model->update(array('pack'=>$data['file_name']), $this->session->userdata('current_pressrelease'));
                
                if ($this->input->is_ajax_request()) {
                    
                    echo json_encode(array($info));
                } else {
                    
                    redirect($_SERVER['HTTP_REFERER']);
                }
        	  	die;
    	  	} 
    	  	
    	  	unset($_POST['pack']);
    	  	
  	        $this->model->update($_POST, $this->session->userdata('current_pressrelease'));
  	        
  	        redirect($_SERVER['HTTP_REFERER']);
    	  	
        }
        
        $data['item'] = $item;
        
        $this->template->build('pressrelease/edit_pack', $data);
    }
    
    public function delete_pack()
    {
        
        $this->_deletePack();
        
        if (!$this->input->is_ajax_request()) {
            redirect($_SERVER['HTTP_REFERER']);
        } 
    }
    
    public function _deletePack() 
    {
        
        $id = $this->session->userdata('current_pressrelease');

        $this->load->model('Pressreleases', 'model');
        $this->load->config('upload');
        
        $item = $this->model->find($id);   
        
        @unlink($this->config->item('upload_path') . $item->pack);
        
        $this->model->update(array('pack'=>null), $id);
        
    }
    
    public function edit_game()
    {
        $data = array();

        $this->template->set_partial('analytics', '_partials/analytics', array('prefix'=>'title_'));
        
        $id = $this->session->userdata('current_pressrelease');

        $this->load->model('Pressreleases', 'model');
        
        $data['item'] = $this->model->find($id);
        
        $this->load->model('Games', 'games');
        
        $data['games'] = $this->games->toAssocArray('id', 'name', $this->games->fetchAll());
        
        $this->form_validation->set_rules('game_id', 'Game', 'trim|required');
        $this->form_validation->set_rules('released', 'Released', 'trim|required');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        
        if ($this->form_validation->run()) {
            
            $this->load->library('Sanitizer', 'sanitizer');
            
            $_POST['url'] = $this->sanitizer->sanitize_title_with_dashes($_POST['title']);
             
            $this->model->update($_POST, $id);
            
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        $this->template->build('pressrelease/edit_game', $data);
    }    
    
    public function edit_video()
    {
        $data = array();

        $this->template->set_partial('analytics_video', '_partials/analytics', array('prefix'=>'video_'));
        $this->template->set_partial('analytics_video_code', '_partials/analytics', array('prefix'=>'video_code_'));
        
        $id = $this->session->userdata('current_pressrelease');

        $this->load->model('Pressreleases', 'model');
        
        $data['item'] = $this->model->find($id);
        
        $this->form_validation->set_rules('video', 'Video', 'trim|required');
        
        if ($this->form_validation->run()) {
            $this->model->update($_POST, $id);
            
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        $this->template->build('pressrelease/edit_video', $data);
    }     

    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Pressreleases', 'model');
            
            //$this->model->delete($id);
            
            $this->_deletePack();
            
            $this->_deleteImage($id, true);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function activate()
    {
        $this->load->model('Pressreleases', 'rumor');
        
        $this->rumor->update(array('active'=>1, 'published'=>date('Y-m-d H:i:s', time())), $this->uri->segment(3));
        
        redirect($_SERVER['HTTP_REFERER']);
    } 

    public function inactivate()
    {
        $this->load->model('Pressreleases', 'rumor');
        
        $this->rumor->update(array('active'=>0), $this->uri->segment(3));
        
        redirect($_SERVER['HTTP_REFERER']);
    }     
    
    public function preview()
    {
        $data = array();
        
        $id = $this->uri->segment(2);
        
        $this->load->model('Pressreleases', 'model');
        
        $data['all'] = $this->model->fetchRows(array(
            'where'=>array('active'=>1),
            'order'=>array('by'=>'published', 'dest'=>'desc')
        ));
        
        if ($id) {
            
            if (is_numeric($id))
                $item = $this->model->find((int)$id);
            else $item = $this->model->findByUrl($id);
        } else {
            $item = $data['all'] ? $data['all'][0] : false;
        }
        
        if ($item && !$item->active && !$this->session->userdata('logged_in')) {
            $item = false;
        } else {
            
            $this->load->model('Games', 'games');
            if ($item) {
                
                $game = $this->games->find($item->game_id);
                if ($game) {
                    
                    $item->game_name = $game->name;
                    $item->game_url = $game->url;
                } else {
                    $item->game_name = false;
                    $item->game_url = false;
                }
                
                $this->load->model('Stores', 'stores');
                
                $item->stores = $this->stores->fetchForPressRelease($item->id);
            }
            
        }
        
        if ($item && $item->pack) {
            $item->size = round(@filesize(dirname($_SERVER['SCRIPT_FILENAME']) . '/uploads/original/'.$item->pack) / (1024*1024), 4);
        } else {
            $item->size = 0;
        }
        
        
        $data['item'] = $item;
        
        $this->template->set_layout('public');
        
        $this->template->set_partial('pressrelease', '_partials/pressrelease', $data);
        
        $this->template->build('pressrelease/preview', $data);
    }
    
    private function _deleteImage($id, $withRecord = false) 
    {
        $this->load->model('Pressreleases', 'model');
        
        $item = $this->model->find($id);
        
        if ($item && $item->logo) {
            $this->load->config('upload');
            
            @unlink($this->config->item('upload_path') . $item->logo);
        }
        
        if (!$withRecord) {
            
            $this->model->update(array('logo'=>null), $id);
        }
        
        return $withRecord ? $this->model->delete($id) : true;
    }     
    
    public function video()
    {
        echo json_encode(
            array('response'=>embed_youtube($this->uri->segment(3)))
        );
        
        die;
    }
}