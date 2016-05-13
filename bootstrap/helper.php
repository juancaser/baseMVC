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
 * @param string $varname
 * @param string $default
 * @return string
 **/
function _getenv($varname,$default = NULL){
     if(!$var = getenv($varname)){
          return $default;
     }else{
          return $var;
     }
}

/**
 * Loads config file
 *
 * @param string $key
 * @return string/array
 **/
function config($key,$default = null){
     $cex = explode('.',$key);
     $config_file = array_shift($cex);
     if(file_exist(dirname(__DIR__)."/config/$config_file.php")){
          $configs = require dirname(__DIR__)."/config/$config_file.php";          
          iterator_apply($iterator, function(){
          }, array($iterator));
     }     
     return $default;
}


config('database.drivers.mysql.host');