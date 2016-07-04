<?php namespace BaseMVC\Kernel;
/**
 * BaseMVC Registry
 *
 * Core files of BaseMVC
 *
 * @author DaJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseMVC
 * @subpackage Kernel
 **/
class Registry {
     private static $inst;
     private $storage = array();
     
     private function __construct(){ /* Private */}
     
     public static function &getInstance(){
          if(is_null(static::$inst) ||
             !(static::$inst instanceof self)) static::$inst = new self;
          return static::$inst;
     }
     
     public function has_var($key){
          if(!isset($this->storage[$key])) return false;
          return true;
     }
     
     public function get_var($key){
          if(!isset($this->storage[$key])) return;
          return $this->storage[$key];          
     }
     
     public function set_var($key, $value){
          $this->storage[$key] = $value;
     }

     public function __set($key,$value){
          $this->set_var($key,$value);
     }
     
     public function __get($key){
          return $this->set_var($key);
     }
}