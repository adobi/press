<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Platforms extends MY_Model 
{
    protected $_name = "ip_platform";
    protected $_primary = "id";
    
    public function fetchAvailbale($pressId)
    {
        return $pressId ? $this->execute("select * from $this->_name where id not in (select platform_id from ip_store where pressrelease_id = $pressId) ") : false;
    }
}