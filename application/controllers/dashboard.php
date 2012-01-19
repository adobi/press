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
        
        $data['items'] = $this->model->fetchAllWithGame($this->uri->segment(3) ? $this->uri->segment(0) : 0);
        
        $data['pagination_links'] = $this->paginate('dashboard/index/', 3, $this->model->count());        
        
        $this->template->build('dashboard/index', $data);
    }
}