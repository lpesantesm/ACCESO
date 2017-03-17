<?php
class KeyInUseException extends Exception { }
class keyInvalidException extends Exception { }
class Collection {
   private $_members = array();

   public function addItem($obj, $key = null) {
     if($key) {
       if(isset($this->_members[$key])) {
       	 throw new KeyInUseException("Key \" $key \" already in use!");
       } else {
          $this->_members[$key] = $obj;
       }
     } else {
         $this->_members[] = $obj; 
     }
   }
   public function editItem($obj, $key) {   
	  if(isset($this->_members[$key])) {
        $this->_members[$key]=$obj;
     } else {
        throw new KeyInvalidException("Invalid key \" $key \"! ");
     }
   }
   
   public function removeItem($key) {
     if(isset($this->_members[$key])) {
        unset($this->_members[$key]);
     } else {
        throw new KeyInvalidException("Invalid key \" $key \"! ");
     }
   }
   public function getItem($key) {
     if(isset($this->_members[$key])) {
        $objItem = $this->_members[$key];
        return $objItem;
     } else {
        throw new KeyInvalidException("Invalid key \" $key \"! ");
     }

   }
   public function length() {
     return (sizeof($this->_members));
   }
   public function keys() {
     return array_keys($this->_members);
   }
   public function exists($key) {
     if (isset($this->_members[$key])){
       return ($this->_members[$key]);
     }else {
        throw new KeyInvalidException("Invalid key \" $key \"! ");
     }
   }
   public function listItems() {
     return array_values($this->_members);
   }
}
?>