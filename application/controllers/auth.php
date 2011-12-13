<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once 'MY_Controller.php';

class Auth extends MY_Controller 
{
    public function index()
    {
        redirect(base_url() . 'auth/login');
    }
    
    public function login() 
    {
        $data = array();
        
       
        if ($_POST && md5($_POST['password']) === md5('a')) {
			
			$this->session->set_userdata('logged_in', true);
			
			redirect(base_url() . 'dashboard');
		}
        
        $this->template->build('login/index', $data);
    }
    
    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        
        $this->session->sess_destroy();
        
        redirect(base_url() . 'auth/login');
    }
}