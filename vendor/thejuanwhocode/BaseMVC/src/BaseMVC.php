<?php namespace BaseMVC;
/**
 * BaseMVC
 *
 * Core files of BaseMVC
 *
 * @author DaJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseMVC
 **/
class BaseMVC {
     
     private $callbacks = array('before' => null, 'middle' => null, 'after' => null);
     
     function __call($method,$arguments){
          if(in_array($method,array_values($this->callbacks)) &&
               (is_array($arguments) && is_callable($arguments[0]))){
               $this->callbacks[$method] = $arguments[0];
          }
     }
     
     function run(){
          foreach($callbacks as $callback){
               if(!is_null($callback) && is_callable($callback)){
                    return call_user_func($callback);
               }
          }
     }
}