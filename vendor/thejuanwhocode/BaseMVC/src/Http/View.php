<?php namespace BaseMVC\Http;
/**
 * View
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseMVC
 * @subpackage Http
 **/
use \BaseMVC\Kernel\Exceptions\ViewNotFoundException;

class View {
     private $options = array();
     public function setOptions($key,$value){
          $this->options[$key] = $value;
     }
     
     /**
      * Render view
      *
      * @param string $path
      * @return string
      **/
     public function render($path,array $data = null  ){
          if(!$path = $this->__locate_view($path))
               throw new ViewNotFoundException('View script not found.');
          
          extract($data);
          
          return require($path);
     }
     
     public function display($path){
          echo $this->render($path);
     }
     
     private function __locate_view($path){
          if(!defined('ABSPATH')) exit();          
          $path = explode('.',$path);
          $path = ABSPATH.DIRECTORY_SEPARATOR.'resource'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.implode(DIRECTORY_SEPARATOR,$path).'.tpl.php';
          if(file_exists($path)){
               return $path;
          }else{
               return false;
          }
     }
}