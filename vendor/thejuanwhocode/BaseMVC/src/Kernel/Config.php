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

use \BaseMVC\Kernel\Registry;
use \BaseMVC\Support\Helper\File;

class Config extends Registry{
     private $register;     
     private function initRegister(){
          $this->register = parent::getInstance();
     }
     
     private function __load_config($path){
          if(is_null($this->register)) $this->initRegister();          
          if(!$config = File::load($path)) return false;          
          if(!isset($this->register->config)) $this->register->config = array();
          
          foreach($config as $key => $value)
               $this->register->config[$key] = $value;
     }
     
     public function get($config){
          $cfg = explode('.',$config);
          $name = array_shift($cfg);
          print_r($cfg);
     }
}