<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Api extends CI_Controller 
{
  public function create()
  {
    if ($_POST) {
      $this->load->model('Pressreleases', 'press');
      
      echo $this->press->insertFromRemote($_POST);
    }
    
    die;
  }
  
  public function get_token_name()
  {
    echo json_encode(array('token_name'=>$this->security->get_csrf_token_name(), 'token_value'=>$this->security->get_csrf_hash()));
    die;
  }
}