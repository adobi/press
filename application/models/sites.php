<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Sites extends MY_Model 
{
    protected $_name = "game";
    protected $_primary = "id";
    
    public function fetchByUrl($url) 
    {
        if (!$url) {
            
            return false;
        }
        
        return $this->fetchRows(array('where'=>array('url'=>$url)));
    }        
}