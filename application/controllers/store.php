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
        
        $this->load->model('Platforms', 'platforms');
        
        if (!$id) {
            
            $data['platforms'] = $this->platforms->toAssocArray('id', 'name', $this->platforms->fetchAvailbale($this->session->userdata('current_pressrelease')));
        } else {
            $data['platforms'] = $this->platforms->toAssocArray('id', 'name', $this->platforms->fetchAll());
        }
        

		$this->form_validation->set_rules("platform_id", "Platform_id", "trim|required|is_natural_no_zero");
        
        if ($this->form_validation->run()) {
        
            $_POST['pressrelease_id'] = $this->session->userdata('current_pressrelease');
            
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $this->model->insert($_POST);
            }
            
            $this->session->set_flashdata('message', 'Saved');
            
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        $this->template->set_partial('analytics', '_partials/analytics', array('prefix'=>''));        
        
        $this->template->build('store/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Stores', 'model');
            
            $this->model->delete($id);

            $this->session->set_flashdata('message', 'Deleted');
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}