<?php namespace BaseMVC\Support\Helper;
/**
 * File Helper
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseMVC
 * @subpackage Helper
 **/

class File {
     private function __construct(){/* Private */}
     
     public static function load($path){
          if(!$path = static::__locate_path($path)) return false;
          return require $path;
     }
     
     public static function inc($path, $once = true){
          if(!$path = static::__locate_path($path)) return false;
          if($once){
               include_once($path);
          }else{
               include($path);
          }
     }
     
     private static function __locate_path($path){
          if(!defined('ABSPATH')) exit();          
          $path = explode('.',$path);
          $path = ABSPATH.DIRECTORY_SEPARATOR.implode(DIRECTORY_SEPARATOR,$path).'.php';
          if(file_exists($path)){
               return $path;     
          }else{
               return false;
          }
     }
}