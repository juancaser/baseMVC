<?php namespace BaseMVC;
/**
 * Base Facade
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseMVC
 * @subpackage Core
 **/

abstract class Facade{
     static protected $facade;
     private static $facades = array();     

     
     private static function setFacadeName($facade){
          $facade = explode('\\',$facade);
          return array_pop($facade);
     }
     
     private static function initFacade($facade){
          if(!class_exists('\ReflectionClass')) throw new \Exception('Cannot initialize facade.');
          return new \ReflectionClass($facade);
     }
     
     static function __callStatic($name,$arguments){
          //$app = \BaseMVC\App::getInstance();
          $name = strtolower(static::setFacadeName(static::$facade));
          $instance = static::initFacade(static::$facade);
          var_dump($instance);
          /*
          if(!is_null($name) && isset($app->{}))
          if(!isset(self::$facades[static::getFacade()])){
               self::$facades[static::getFacade()] = static::getInstance();
          }
          var_dump($arguments);
          return call_user_func_array(self::$facades[static::getFacade()],array($arguments));
          */
     }
}