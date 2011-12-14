<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Game extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('', 'model');
        
        $data['items'] = $this->model->fetchAll();
        
        $this->template->build('/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Sites', 'model');
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['item'] = $item;
        
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('url', 'Url', 'trim|required');
        
        if ($this->form_validation->run()) {
            
            if ($this->upload->do_upload('logo')) {
                
                if ($id) {
                    
                    $this->_deleteFile($id, 'logo');
                }
                
                $_POST['logo'] = $this->upload->file_name;
                
            }
            
            if ($this->upload->do_upload('pack')) {
                
                if ($id) {
                    
                    $this->_deleteFile($id, 'pack');
                }
                
                $_POST['pack'] = $this->upload->file_name;
                
            }            
            
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                
                $this->model->insert($_POST);
            }
            
            redirect(base_url() . 'dashboard');
        }
        
        $this->template->build('game/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Sites', 'model');
            
            $this->_deleteFile($id, false, true);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function show() 
    {
        
    }
    
    public function images() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Images', 'model');
        $this->load->model('Sites', 'site');
        
        $data['site'] = $this->site->find($id);
        
        $data['items'] = $this->model->fetchForSite($id);
        
        $this->template->build('game/images', $data);        
    }
    
    public function upload_image() 
    {
        
	  	if ($this->upload->do_upload()) {
	  	    
	  	    $this->load->config('upload');
	  	    
	  	    $data = $this->upload->data();

            $config['image_library'] = 'gd2';
            $config['source_image'] = $this->config->item('upload_path') . $data['file_name'];
            //$config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = $this->config->item('image_width');
            $config['height'] = $this->config->item('image_height');
            $config['new_image'] = $this->config->item('upload_path_base') .$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $config['image_library'] = 'gd2';
            $config['source_image'] = $this->config->item('upload_path') . $data['file_name'];
            $config['width'] = $this->config->item('thumb_width');
            $config['height'] = $this->config->item('thumb_height');
            $config['new_image'] = $this->config->item('upload_path_base') . 'thumbs/'.$data['file_name'];
            //$this->load->library('image_lib', $config);
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            
            //@unlink($this->config->item('upload_path') . $data['file_name']);
            
            $this->load->model('Images', 'model');
            
            $inserted = $this->model->insert(array(
                'site_id'=>$this->uri->segment(3),
                'image'=>$data['file_name']
            ));
            
	  	    
            $info->name = $data['file_name'];
            $info->size = $data['file_size'];
            $info->type = $data['file_type'];
            $info->url = base_url() . 'uploads/' .$data['file_name'];
            $info->thumbnail_url = base_url() . 'uploads/thumbs/' .$data['file_name'];
            //$info->delete_url = base_url().'microsite/delete/'.$inserted;
            $info->delete_type = 'DELETE';	 
            
            if ($this->input->is_ajax_request()) {
                echo json_encode(array($info));
            } 
	  	}
	  	
        die;
    }
       
    public function delete_file() 
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            
            $this->_deleteFile($id, $this->uri->segment(4));
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
      
    public function delete_site_image()
    {
        $id = $this->uri->segment(3);
        
        $this->load->model('Images', 'model');
        if (is_numeric($id)) {
            // delete by id, from db too
            
            $item = $this->model->find($id);
            
            $file = $item->image;
            
            $this->model->delete($id);
            
        } else {
            // delete only the file
            
            $file = $id;
        }
        
        $this->load->config('upload');
        
        if ($file) {
            
            @unlink($this->config->item('upload_path_base') . $file);
            @unlink($this->config->item('upload_path_base') . 'thumbs/' . $file);
            @unlink($this->config->item('upload_path') . $file);
            
        }
        redirect($_SERVER['HTTP_REFERER']);
    }    
    
    public function videos() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Videos', 'model');
        $this->load->model('Sites', 'site');
        
        $this->form_validation->set_rules('video', 'Embed code', 'trim|required');
        
        if ($this->form_validation->run()) {
            
            $_POST['site_id'] = $id;
            
            if (isset($_POST['id']) && $_POST['id']) {
                
                $id = $_POST['id'];
                unset($_POST['id']);
                
                $this->model->update($_POST, $id);
            } else {
                
                $this->model->insert($_POST);
            }
            
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        $data['site'] = $this->site->find($id);
        
        $data['items'] = $this->model->fetchForSite($id);
        
        $this->template->build('game/videos', $data);        
    }     
    
    private function _deleteFile($id, $type, $withRecord = false) 
    {
        $this->load->model('Sites', 'model');
        
        if ($type) {
            
            $item = $this->model->find($id);
            
            if ($item && $item->$type) {
                $this->load->config('upload');
                
                @unlink($this->config->item('upload_path_base') . $item->$type);
                @unlink($this->config->item('upload_path') . $item->$type);
            }
            
            if (!$withRecord) {
                
                $this->model->update(array($type=>null), $id);
            }
            
        }
        return $withRecord ? $this->model->delete($id) : true;
    }    
}