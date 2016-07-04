<?php namespace BaseMVC\Http;
/**
 * Router
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseMVC
 * @subpackage Http
 **/

use \BaseMVC\Kernel\App; 
 
class Router {
     private $options = array();
     private $routes = array();
     private $filters = array();
     private $error_callback;
     
     public function setOptions($key,$value){
          $this->options[$key] = $value;
     }
     

     /**
      * GET method
      *
      * @param string $route
      * @param string $param
      **/    
     public function get(){
          $this->request(__FUNCTION__, func_get_args());
     }
     
     /**
      * POST method
      **/    
     public function post(){
          $this->request(__FUNCTION__, func_get_args());
     }
     
     /**
      * AJAX method
      **/    
     public function ajax(){
          $this->request(__FUNCTION__, func_get_args());
     }
     
     /**
      * REST method
      **/    
     public function rest(){
          $this->request(__FUNCTION__, func_get_args());
     }
     
     /**
      * REQUEST method
      *
      * @param string $route
      * @param array $args
      **/    
     public function request($method,$args){
          if(is_null($args)) return;

          // Route pattern
          $pattern = array_shift($args);
          if($pattern != '/'){
               $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
          }

          // Route parameters
          $parameters = array_shift($args);          
     
          $this->routes[$method][$pattern] = $parameters;
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
     
     /**
      * Router error callback
      *
      * @param callable $callback
      **/
     public function error($callback){
          if(!is_callable($callback)) return;
          $this->error_callback = $callback;
     }
     
     /**
      * Run router
      **/
     public function run(){          
          $method = strtolower($_SERVER['REQUEST_METHOD']);
          $uri = trim($_SERVER['REQUEST_URI'],'/');
          
          if(empty($uri)) $uri = '/';
          $route = null;
          $route_params = array();
          
          if(array_key_exists($uri, $this->routes[$method])){
               $route = $this->routes[$method][$uri];
          }else{
               foreach($this->routes[$method] as $pattern => $callback){
                    if($pattern != '/' && preg_match($pattern, $uri, $params)){
                         array_shift($params);
                         $route = $callback;
                         $route_params = $params;
                    }     
               }
          }
          if(!is_null($route)){
               if(is_callable($route)){
                    if(count($route_params) > 0){
                         App::header(200);
                         exit(call_user_func_array($callback, array_values($route_params)));
                    }else{
                         exit(call_user_func($route));     
                    }                    
               }elseif(is_array($route)){                    
                    if(is_callable($route['func'])){
                         App::header(200);
                         exit(call_user_func($route['func']));
                    }elseif(is_callable($route['controller'])){
                         $ex = explode('@',$route['controller']);
                         $controller = array_shift($ex);
                         $method = array_shift($ex);
                         
                         $ref = new \ReflectionClass($controller);
                         $cntlrInst = $ref->newInstanceWithoutConstructor();
                         exit(call_user_func([$ref->newInstanceWithoutConstructor(),$method]));
                         
                    }
                    
               }
          }

          exit();
          /*
          foreach($this->routes[$method] as $pattern => $callback){
               echo $pattern;
               echo '<br/>';
               echo $uri;
               echo '<br/>';
               var_dump(preg_match($pattern, $uri, $params));
               echo '<br/>';
          }
          */
          /*
          if(array_key_exists($uri, $this->routes[$method])){ // Basic routing
               App::header(200);
               exit(call_user_func($this->routes[$method][$uri]));
          }else{
               foreach($this->routes[$method] as $pattern => $callback){
                    if($pattern != '/' && preg_match($pattern, $uri, $params)){
                         array_shift($params);
                         App::header(200);
                         exit(call_user_func_array($callback, array_values($params)));
                    }     
               }
          }
          */
          
          App::header(400);
          call_user_func_array($this->error_callback,[404,'Page not Found']);
     }
}
