<?php namespace BaseMVC;
/**
 * Base Facade
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseMVC
 * @subpackage Core
 **/

use BaseMVC\Exceptions\FacadeException;
 
abstract class Facade{
     static protected $facade;
     static protected $facade_name;
     private static $facades = array();     
     

     private static function setFacadeName($facade){
          if(isset($facade_name)){
               return $facade_name;
          }else{
               $facade = explode('\\',$facade);
               return array_pop($facade);
          }
     }
     
     private static function facadeInstance($facade_name){
          if(array_key_exists($facade_name,self::$facades)){               
               $inst = self::$facades[$facade_name];
          }else{
               if(!class_exists('\ReflectionClass')) throw new FacadeException('Cannot initialize facade.');
               if(!class_exists(static::$facade)) throw new FacadeException('Class not found.');               
               $ref = new \ReflectionClass(static::$facade);
               $inst = $ref->newInstanceWithoutConstructor();
               self::$facades[$facade_name] = $inst;
          }
          
          return $inst;
     }
     
     static function __callStatic($name,$arguments){
          $instance = static::facadeInstance(strtolower(static::setFacadeName(static::$facade)));
          if(method_exists($instance,$name)){               
               return call_user_func_array([$instance,$name],array($arguments));     
          }
     }
}