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
	
	public function insertFromRemote($data)
	{
	  
	  if (!$data) return false;
    
	  $this->load->library('Sanitizer');
	  
	  $insert = array(
	    'title'=>$data['title'],
	    'released'=>$data['released'],
	    'url'=>$this->sanitizer->sanitize_title_with_dashes($data['title'])
	  );

    $this->load->model('Defaults', 'defaults');
    $defaults = $this->defaults->find($this->defaults->getid());
	  
    foreach ($defaults as $prop=>$val) {
        if ($prop !== 'id')
            $insert[$prop] = $val;
    }
    
    $this->load->model('Games', 'games');
    
    $game = $this->games->find($data['game_id']);
    
    $insert['active'] = 0;
    $insert['created'] = date('Y-m-d H:i:s', time());    
    $insert['game_id'] = $data['game_id'];
    $insert['video'] = $data['video'];
    
    $insert['title_ga_category'] = 'Press Release';
    $insert['title_ga_action'] = 'Click';
    $insert['title_ga_value'] = 1;
    $insert['title_ga_label'] = $game->name . ' - ' . $data['title'];
    
    $insert['pack_ga_category'] = 'Press Pack';
    $insert['pack_ga_action'] = 'Download';
    $insert['pack_ga_value'] = 1;
    $insert['pack_ga_label'] =  $game->name . ' - ' . $data['title'];
    
    $insert['video_ga_category'] = 'Video';
    $insert['video_ga_action'] = 'Play';
    $insert['video_ga_value'] = 1;
    $insert['video_ga_label'] =  $game->name . ' - ' . $data['title'];
    
    $insert['video_code_ga_category'] = 'Embed Code';
    $insert['video_code_ga_action'] = 'Copy';
    $insert['video_code_ga_value'] = 1;
    $insert['video_code_ga_label'] =  $game->name . ' - ' . $data['title'] . ' - Video';
    
    $insert['logo'] = $this->_getImageFromUrl($data['logo'], $data['logo_name']);
    
    $inserted = $this->insert($insert);
    
    if ($inserted) {
      $this->load->model('Stores', 'stores');
      
      if ($data['platforms']) {
        $p = array('pressrelease_id'=>$inserted);
        $p['ga_category'] = "Embed Code";
        $p['ga_action'] = "Copy";
        $p['ga_value'] = 1;

        $p['link_ga_category'] = "Outbound Link";
        $p['link_ga_action'] = "Click";
        $p['link_ga_value'] = 1;
        
        $this->load->model('Platforms', 'platform');
        foreach ($data['platforms'] as $i=>$item) {
          $platform = $this->platform->find($item);
          $p['ga_label'] = $game->name . ' - ' . $data['title'] . ' - ' . $platform->name;
          $p['link_ga_label'] = $game->name . ' - ' . $data['title'] . ' - ' . $platform->name;
          $p['platform_id'] = $item;
          $p['url'] = $data['urls'][$i];
          
          $this->stores->insert($p);
        }
      }
    }
    
    if (!$inserted) {
      return json_encode(array('message'=>'Press release not created'));
    } else {
      return json_encode(array('insert_id'=>$inserted, 'message'=>'Press release created'));
    }
	}
	
    /** 
     * get an image from the remote
     *
     * @param string $url 
     * @param string $name 
     * @return string the name of the loaded image
     * @author Dobi Attila
     */
    private function _getImageFromUrl($url, $name)
    {
      if ($url && $name) {
        
        $imageBinary = file_get_contents($url);
        
        $this->config->load('upload');
        
        $image = time().'_'.$name;
        file_put_contents($this->config->item('upload_path').$image, $imageBinary);
        
        return $image;
      } 
      
      return false;
    }	

}