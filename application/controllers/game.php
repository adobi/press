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
        
        $this->load->model('Games', 'model');
        
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
            $this->load->model('Games', 'model');
            
            $this->_deleteFile($id, false, true);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function show() 
    {
        
    }
    
    private function _deleteFile($id, $type, $withRecord = false) 
    {
        $this->load->model('Games', 'model');
        
        if ($type) {
            
            $item = $this->model->find($id);
            
            if ($item && $item->$type) {
                $this->load->config('upload');
                
                @unlink($this->config->item('upload_path_base') . $item->$type);
            }
            
            if (!$withRecord) {
                
                $this->model->update(array($type=>null), $id);
            }
            
        }
        return $withRecord ? $this->model->delete($id) : true;
    }    
}