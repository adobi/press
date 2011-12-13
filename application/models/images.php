<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Model.php';
class Images extends MY_Model 
{
    protected $_name = "image";
    protected $_primary = "id";
    
    public function fetchForSite($id) 
    {
        if (!$id) {
            
            return false;
        }
        
        return $this->fetchRows(array('where'=>array('site_id'=>$id), 'order'=>array('by'=>'order', 'dest'=>'asc')));
    }
}