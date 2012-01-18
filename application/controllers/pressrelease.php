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
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        } else {
            //$inserted = $this->model->insert();
            
            //redirect(base_url().'pressrelease/edit/'.$inserted);
        }
        $data['item'] = $item;
        /*
        $this->form_validation->set_rules("game_id", "Game_id", "trim|required");
		$this->form_validation->set_rules("released", "Released", "trim|required");
		$this->form_validation->set_rules("logo", "Logo", "trim|required");
		$this->form_validation->set_rules("pack_description", "Pack_description", "trim|required");
		$this->form_validation->set_rules("header_col2", "Header_col2", "trim|required");
		$this->form_validation->set_rules("header_col1", "Header_col1", "trim|required");
		$this->form_validation->set_rules("description", "Description", "trim|required");
		$this->form_validation->set_rules("title_ga_category", "Title_ga_category", "trim|required");
		$this->form_validation->set_rules("title_ga_action", "Title_ga_action", "trim|required");
		$this->form_validation->set_rules("title_ga_label", "Title_ga_label", "trim|required");
		$this->form_validation->set_rules("title_ga_value", "Title_ga_value", "trim|required");
		$this->form_validation->set_rules("title_ga_noninteraction", "Title_ga_noninteraction", "trim|required");
		$this->form_validation->set_rules("pack_ga_category", "Pack_ga_category", "trim|required");
		$this->form_validation->set_rules("pack_ga_action", "Pack_ga_action", "trim|required");
		$this->form_validation->set_rules("pack_ga_label", "Pack_ga_label", "trim|required");
		$this->form_validation->set_rules("pack_ga_value", "Pack_ga_value", "trim|required");
		$this->form_validation->set_rules("pack_ga_noninteraction", "Pack_ga_noninteraction", "trim|required");
		*/
        
        if ($this->form_validation->run()) {
        
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $this->model->insert($_POST);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->template->build('pressrelease/edit', $data);
    }
    
    public function edit_section()
    {
        $data = array();
        
        
        $this->template->build('pressrelease/edit_section', $data);
    }

    
    public function edit_analytics()
    {
        $data = array();
        
        $data['item'] = false;
        
        $this->template->build('pressrelease/edit_analytics', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Pressreleases', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}