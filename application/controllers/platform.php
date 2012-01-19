<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Platform extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Platforms', 'model');
        
        $data['items'] = $this->model->fetchAll();
        
        $this->template->build('platform/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Platforms', 'model');
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['item'] = $item;
        
        $this->form_validation->set_rules("name", "Name", "trim|required");
		//$this->form_validation->set_rules("url", "Url", "trim|required");
        
        if ($this->form_validation->run()) {

            if ($this->upload->do_upload('image')) {
                
                if ($id) {
                    
                    $this->_deleteImage($id);
                }
                
                $_POST['image'] = $this->upload->file_name;
            } 
        
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $this->model->insert($_POST);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->template->build('platform/edit', $data);
    }
    
    public function delete_image() 
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            
            $this->_deleteImage($id);
            
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }      
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Platforms', 'model');
            
            $this->model->delete($id);
            
            $this->_deleteImage($id, true);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    
    
    private function _deleteImage($id, $withRecord = false) 
    {
        $this->load->model('Platforms', 'model');
        
        $item = $this->model->find($id);
        
        if ($item && $item->image) {
            $this->load->config('upload');
            
            @unlink($this->config->item('upload_path') . $item->image);
        }
        
        if (!$withRecord) {
            
            $this->model->update(array('image'=>null), $id);
        }
        
        return $withRecord ? $this->model->delete($id) : true;
    }       
}