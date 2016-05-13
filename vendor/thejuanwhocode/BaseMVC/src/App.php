<?php namespace BaseMVC;
/**
 * BaseMVC App
 *
 * Core files of BaseMVC
 *
 * @author DaJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseMVC
 **/
class App {
     private static $instance;
     private $storage = array();
     private $callbacks = array('before' => null, 'middle' => null, 'after' => null);
     
     private function __construct(){
          // Singleton
     }
     public static function &getInstance($instance = null){
          if(is_null($instance)){
               if(is_null(static::$instance) || static::$instance instanceof self){
                    static::$instance = new self;
               }
          }else{
               static::$instance = $instance;
          }
          return static::$instance;
     }
     /**
      * App callbacks
      **/
     function before(callable $callback){
          $this->callbacks[__FUNCTION__] = $callback;
     }
     function middle(callable $callback){
          $this->callbacks[__FUNCTION__] = $callback;
     }
     function after(callable $callback){
          $this->callbacks[__FUNCTION__] = $callback;
     }
     
     function run(){
          if(!is_null($this->callbacks['before'])) call_user_func($this->callbacks['before']);
          if(!is_null($this->callbacks['middle'])) call_user_func($this->callbacks['middle']);
          if(!is_null($this->callbacks['after'])) call_user_func($this->callbacks['after']);
     }
     
     
     
     public function __set($key,$value){
          $this->storage[$key] = $value;
     }
     public function __get($key){
          if(!isset($this->storage[$key])) return;
           return $this->storage[$key];
     }
}