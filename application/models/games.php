<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Games extends MY_Model 
{
    protected $_name = "ip_game";
    protected $_primary = "id";
    
    /**
     * truncates the table, and inserts the items
     *
     * @param string $items 
     * @return void
     * @author Dobi Attila
     */
    public function saveFromApi_($items)
    {
        if (!$items) return false;
        
        $this->execute('truncate table ' . $this->getName().';');
        $res = 0;
        foreach ($items as $r) {
            $this->insert(array('id'=>$r->id, 'name'=>$r->name, 'url'=>$r->url));
            
            $res++;
        }        
        
        return $res === count($items);
        
        /*
            TODO
                STEP 1: diff ($items_db, $items_param) items that are not in the api result -> DELETE CASCADE
                STEP 2: diff ($items_param, $items_db) items that are not in our db -> INSERT
                STEP 3: check the common elements if they are the same, name and uri -> UPDATE
        */
    }
    
    /**
     * STEP 1: diff ($items_db, $items_param) items that are not in the api result -> DELETE CASCADE
     * STEP 2: diff ($items_param, $items_db) items that are not in our db -> INSERT
     * STEP 3: check the common elements if they are the same, name and uri -> UPDATE
     *
     * @param string $itemsFromApi 
     * @return void
     * @author Dobi Attila
     */
    public function saveFromApi($itemsFromApi)
    {
        
        if (!$itemsFromApi) return false;
        
        $itemsFromDb = $this->fetchAll();
        
        /**
         * if the db is empty insert every element from the api
         *
         * @author Dobi Attila
         */
        if (!$itemsFromDb) {
            
            $this->_insertItems($itemsFromApi);
            
            return true;
        }
        
        $itemsFromApiTransformed = $this->_transformArray($itemsFromApi);
        $itemsFromDbTransformed = $this->_transformArray($itemsFromDb);
        
        $indexesFromDb = $this->_getField($itemsFromDbTransformed, 'id');
        $indexesFromApi = $this->_getField($itemsFromApiTransformed, 'id');
        
        $itemsInDbAndNotInApi = array_diff($indexesFromDb, $indexesFromApi);

        $this->_deleteItems($itemsInDbAndNotInApi);
        
        $itemsInApiAndNotInDb = array_diff($indexesFromApi, $indexesFromDb);
        
        $this->_insertItems($this->_getElementsAtIndexes($itemsFromApiTransformed, $itemsInApiAndNotInDb));
        
        $common = array_intersect($indexesFromApi, $indexesFromDb);
        
        $itemsWithDiff = $this->_getDiffItems($itemsFromApiTransformed, $itemsFromDbTransformed, $common);
        //dump($itemsWithDiff); die;
        $this->_updateItems($itemsWithDiff);
    }
    
    private function _getDiffItems($api, $db, $common)
    {
        if (!$api || !$db || !$common) return false;
        
        $diff = array();
        foreach ($common as $item) {
            $a = $api[$item]; $d = $db[$item];
            if ($a->name !== $d->name || $a->url !== $d->url) {
                $diff[] = $a;
            }
        }
        
        //dump($diff); die;
        
        return $diff;
    }
    
    private function _updateItems($array) 
    {
        if (!$array) return false;
        
        foreach ($array as $item) {
            $this->update(array('name'=>$item->name, 'url'=>$item->url), $item->id);
        }
    }
    
    private function _getElementsAtIndexes($array, $indexes)
    {
        if (!$array || !$indexes) return false;
        
        $return = array();
        foreach ($indexes as $item) {
            $return[] = $array[$item];
        }
        
        return $return;
    }
    
    private function _insertItems($array) 
    {
        if (!$array) return false;
        
        foreach ($array as $item) {
            $this->insert(array('id'=>$item->id, 'name'=>$item->name, 'url'=>$item->url));
        }
    }
    
    private function _deleteItems($array)
    {
        if (!$array) return false;
        
        foreach ($array as $item) {
            $this->delete($item);
        }
    }
    private function _getField($array, $field)
    {
        if (!$array) return false;
        
        $return = array();
        foreach ($array as $item) {
            $return[] = $item->$field;
        }
        return $return;
    }
    
    private function _transformArray($array)
    {
        if (!$array) return false;
        
        $return = array();
        foreach ($array as $item)
        {
            $return[$item->id] = $item;
        }
        
        return $return;
    }
}