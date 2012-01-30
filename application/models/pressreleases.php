<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Pressreleases extends MY_Model 
{
    protected $_name = "ip_pressrelease";
    protected $_primary = "id";
    
    /**
     * return press releases with game information
     *
     * @param string $offset 
     * @return void
     * @author Dobi Attila
     */
	public function fetchAllWithGame($offset) 
	{
	    
	    return $this->fetchAll(array(
	        'join'=>array(

	            array('table'=>'ip_game', 'columns'=>array('name as game_name', 'ip_game.url as game_url'), 'condition'=>"$this->_name.game_id = ip_game.id")
	        ),
	        'offset'=>$offset,
	        'limit'=>ITEMS_PER_PAGE
	    ));
	}
	
	/**
	 * returns those games which has a press release
	 *
	 * @return void
	 * @author Dobi Attila
	 */
	public function fetchGames()
	{
	    $sql = "select g.name, g.id from $this->_name p join ip_game g on p.game_id = g.id";
	    
	    return $this->execute($sql);
	}
	
	/**
	 * returns all pressreleases which are not equal with the $id
	 *
	 * @param string $id 
	 * @return void
	 * @author Dobi Attila
	 */
	public function fetchOtherThan($id) 
	{
	    return $this->execute("select p.* from $this->_name p where p.id != $id");
	}
    
	/**
	 * press release by type: active, inactive
	 *
	 * @param string $type 
	 * @param string $offset 
	 * @return void
	 * @author Dobi Attila
	 */
	public function fetchByType($type, $offset = 0) 
	{
	    if (!is_numeric($type)) {
	        return false;
	    }
	    
	    return $this->fetchRows(array(
	        'join'=>array(

	            array('table'=>'ip_game', 'columns'=>array('name as game_name', 'ip_game.url as game_url'), 'condition'=>"$this->_name.game_id = ip_game.id")
	        ),
	        'where'=>array(
	            'active'=>$type
	        ),
	    ));
	}
	
	/**
	 * press release for a game
	 *
	 * @param string $game 
	 * @param string $offset 
	 * @return void
	 * @author Dobi Attila
	 */
	public function fetchByGame($game, $offset = 0) 
	{
	    if (!$game || !is_numeric($game)) {
	        return false;
	    }
	    
	    return $this->fetchRows(array(
	        'join'=>array(

	            array('table'=>'ip_game', 'columns'=>array('name as game_name', 'ip_game.url as game_url'), 'condition'=>"$this->_name.game_id = ip_game.id")
	        ),
	        'where'=>array(
	            'game_id'=>$game
	        ),
	    ));
	    
	}
	
	public function findByUrl($url) 
	{
	    if (!$url) return false;
	    
	    $result = $this->fetchRows(array('where'=>array('url'=>$url)));
	    
	    return $result ? $result[0] : false;
	}

}