<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Store extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Stores', 'model');
        
        $data['items'] = $this->model->fetchAll();
        
        $this->template->build('store/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Stores', 'model');
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['item'] = $item;
        
        $this->form_validation->set_rules("pressrelease_id", "Pressrelease_id", "trim|required");
		$this->form_validation->set_rules("platform_id", "Platform_id", "trim|required");
		$this->form_validation->set_rules("url", "Url", "trim|required");
		$this->form_validation->set_rules("ga_category", "Ga_category", "trim|required");
		$this->form_validation->set_rules("ga_action", "Ga_action", "trim|required");
		$this->form_validation->set_rules("ga_label", "Ga_label", "trim|required");
		$this->form_validation->set_rules("ga_value", "Ga_value", "trim|required");
		$this->form_validation->set_rules("ga_noninteraction", "Ga_noninteraction", "trim|required");
		
        
        if ($this->form_validation->run()) {
        
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $this->model->insert($_POST);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->template->build('store/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Stores', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}