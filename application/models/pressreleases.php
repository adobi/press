<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Pressreleases extends MY_Model 
{
    protected $_name = "ip_pressrelease";
    protected $_primary = "id";
    
	public function fetchAllWithGame($offset) 
	{
	    return $this->fetchAll(array(
	        'join'=>array(
	            array('table'=>'ip_game', 'columns'=>array('name as game_name', 'url as game_url'), 'condition'=>"$this->_name.game_id = ip_game.id")
	        ),
	        'offset'=>$offset,
	        'limit'=>ITEMS_PER_PAGE
	    ));
	}

}