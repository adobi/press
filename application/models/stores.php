<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Stores extends MY_Model 
{
    protected $_name = "ip_store";
    protected $_primary = "id";
    
    public function fetchForPressRelease($pressId)
    {
        if (!$pressId) return false;
        
        $sql = "select s.*, p.name, p.image from $this->_name s join ip_platform p on s.platform_id = p.id where s.pressrelease_id = $pressId";
        
        return $this->execute($sql);
    }
}