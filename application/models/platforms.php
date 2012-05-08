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
    
    public function initFromApi()
    {
      
      $data = $this->invictus->setUri(INVICTUS_API_URI)->setAction('platforms')->get(true);
      //dump($data);
      if (!$data) return false;
      
      foreach ($data as &$item) {
        
        $image = $this->_getImageFromUrl($item['image'], $item['image_name']);
        
        unset($item['image']);
        unset($item['image_name']);
        
        $item['image'] = $image;
        
        $item['url'] = $this->sanitizer->sanitize_title_with_dashes($item['name']);
      }
      
      /*
        TODO delete the old images for the platform
      */
      $this->truncate();
      
      $this->bulk_insert($data);
      
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