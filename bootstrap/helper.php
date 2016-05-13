<?php
/**
 * baseMVC bootstrap helper
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package baseMVC
 * @subpackage bootsrap
 **/

/**
 * _getenv
 *
 * @version 1
 * @subpackage 1
 * 
 * @param string $varname
 * @param string $default
 * @return string
 **/
function _getEnv($varname,$default = NULL){
     if(!$var = getenv($varname)){
          return $default;
     }else{
          return (!empty($var) ? $var : $default);
     }
}

/**
 * Convert array to array to object
 * 
 * @version 1
 * @subpackage 1
 *
 * @param array $array
 * @return array
 **/
function convertArrToObj($array){
     return json_decode(json_encode($array));
}

/**
 * Loads config file
 *
 * @version 1
 * @subpackage 1
 *
 * @param string $key
 * @return string/array
 **/
function config($key,$default = null){
     
     $keys = explode('.',$key);
     $config_file = array_shift($keys); // Config file
     
     if (file_exists(dirname(__DIR__).'/config/'.$config_file.'.php')) {
          $configs = require dirname(__DIR__)."/config/$config_file.php";
          $tmp = $configs;
          foreach ($keys as $v) {
               if (array_key_exists($v,$tmp)) {                    
                    $tmp = $tmp[$v];
               }
          }
          return $tmp;
     }
     return $default;
}

/**
 * Normalize directory path according to what system
 *
 * @version 1
 * @subpackage 1
 *
 * @param string $path
 * @return string
 **/
function normalizeDirectoryPath($path){
     $path =  str_replace('//',DIRECTORY_SEPARATOR,$path);
     return $path;
}