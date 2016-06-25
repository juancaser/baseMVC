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
     public function before($callback){
          $this->callbacks[__FUNCTION__] = $callback;
     }
     
     public function middle($callback){
          $this->callbacks[__FUNCTION__] = $callback;
     }
     
     public function after($callback){
          $this->callbacks[__FUNCTION__] = $callback;
     }
     
     public function init(){
          var_dump($this->callbacks['before']);
          if(!is_null($this->callbacks['before']) && is_callable($this->callbacks['before'])){
               exit('x');
               call_user_func_array($this->callbacks['before'],[$this]);
          }
          if(!is_null($this->callbacks['middle']) && is_callable($this->callbacks['middle'])){
               call_user_func_array($this->callbacks['middle'],[$this]);
          }
          if(!is_null($this->callbacks['after']) && is_callable($this->callbacks['after'])){
               call_user_func_array($this->callbacks['after'],[$this]);
          }
     }
     
     
     
     public function __set($key,$value){
          $this->storage[$key] = $value;
     }
     public function __get($key){
          if(!isset($this->storage[$key])) return;
           return $this->storage[$key];
     }
}