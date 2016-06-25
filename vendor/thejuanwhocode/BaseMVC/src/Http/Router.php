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
     private $filters = array();
     
     public function setOptions($key,$value){
          $this->options[$key] = $value;
     }
     

     /**
      * GET method
      *
      * @param string $route
      * @param string $param
      **/    
     public function get($route,$param){
          $this->request($route,$param,__FUNCTION__);
     }
     
     /**
      * POST method
      *
      * @param string $route
      * @param string $param
      **/    
     public function post($route,$param){
          $this->request($route,$param,__FUNCTION__);
     }
     
     /**
      * AJAX method
      *
      * @param string $route
      * @param string $param
      **/    
     public function ajax($route,$param){
          $this->request($route,$param,__FUNCTION__);
     }
     
     /**
      * REST method
      *
      * @param string $route
      * @param string $param
      **/    
     public function rest($route,$param){
          $this->request($route,$param,__FUNCTION__);
     }
     
     /**
      * REQUEST method
      *
      * @param string $route
      * @param string $param
      **/    
     public function request($route,$param, string $method = 'request'){
          $this->routes[$method][$route] = $param;
     }
     
     /**
      * Domain filter
      *
      * @param string $domain
      * @param string $param
      **/
     public function domain($domain,$param){
          $this->filters[__FUNCTION__][$domain] = $param;
     }
}