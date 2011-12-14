<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Image extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Images', 'model');
        
        $data['items'] = $this->model->fetchAll();
        
        $this->template->build('/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('', 'model');
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['item'] = $item;
        
        if ($this->form_validation->run()) {
        
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $this->model->insert($_POST);
            }
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            if ($_POST) {
                
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        
        $this->template->build('/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function analytics()
    {
        $data = array();

        $id = $this->uri->segment(3);
        
        $this->load->model('Images', 'model');
        
        $item = $this->model->find($id);
        
        $data['item'] = $item;
        
        if ($_POST) {
            
            if (!isset($_POST['ga_noninteraction'])) {
                $_POST['ga_noninteraction'] = null;
            }            
            
            $this->model->update($_POST, $id);
            
            redirect(base_url() . 'game/images/' . $item->site_id);
        }
        
        $this->template->set_partial('event_tracking', '_partials/event_tracking');
        
        $this->template->build('image/analytics', $data);        
    }
    
    public function update_order()
    {
        if ($_POST && isset($_POST['order'])) {
            
            $this->load->model('Images', 'model');
            
            foreach ($_POST['order'] as $order => $id) {
                $this->model->update(array('order'=>$order), $id);
            }
        }
        
        die;
    }
}