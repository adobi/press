<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Dashboard extends MY_Controller 
{
    public function index() 
    {
        $this->session->unset_userdata('current_pressrelease');
        
        $data = array();
        
        $this->load->model('Pressreleases', 'model');
        
        $data['press_games'] = $this->model->fetchGames();
        
        $data['items'] = false;
        if (!$this->uri->segment(4)) {
            
            $data['items'] = $this->model->fetchAllWithGame($this->uri->segment(3) ? $this->uri->segment(3) : 0);
        
            $data['pagination_links'] = $this->paginate('dashboard/index/', 3, $this->model->count());        
        
        } else {
            
            if ($this->uri->segment(4) === 'type') {
                
                $type = $this->uri->segment(5);
                
                $data['items'] = $this->model->fetchByType($type-1);
            }
            
            if ($this->uri->segment(4) === 'game') {
                
                $data['items'] = $this->model->fetchByGame($this->uri->segment(5));
            }
            
            $data['pagination_links'] = '';
        }

        $this->template->build('dashboard/index', $data);
    }
}