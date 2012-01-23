<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Settings extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Defaults', 'model');
        
        $data['item'] = $this->model->find($this->model->getId());
        
        $this->template->build('settings/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $this->load->model('Defaults', 'model');
        
        if ($_POST) {
            
            
            $i = $this->model->update($_POST, $this->model->getId());
            
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->template->build('settings/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Defaults', 'model');
            
            //$this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}