<?php namespace BaseMVC\Http;
/**
 * Router
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseMVC
 * @subpackage Http
 **/

class Router {
     private $options = array();
     private $routes = array();
     
     public function setOptions($key,$value){
          $this->options[$key] = $value;
     }     
}