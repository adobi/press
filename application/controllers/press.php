<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Press extends MY_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        
        $this->template->set_layout('site');
    }
    
    public function index() 
    {
        $data = array();
        
        $this->load->model('Sites', 'model');
        
        $data['items'] = $this->model->fetchAll();
        
        $this->template->build('press/index', $data);
    }
    
    public function show()
    {
        $data = array();
        
        $this->load->model('Sites', 'site');
        $this->load->model('Images', 'image');
        $this->load->model('Videos', 'video');

        
        $data['site'] = current($this->site->fetchByUrl($this->uri->segment(2)));
        
        if ($data['site']) {
            
            $data['images'] = $this->image->fetchForSite($data['site']->id);
            $data['videos'] = $this->video->fetchForSite($data['site']->id);
        }
        
        $this->template->build('press/show', $data);
    }
    
    public function video()
    {
        echo embed_youtube($this->uri->segment(3), true);
        die;
    }
    
    public function video_image()
    {
        echo youtube_video_image($this->uri->segment(3));
        die;
    }    
}