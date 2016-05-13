<?php namespace BaseMVC\Http;
/**
 * View
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseMVC
 * @subpackage Http
 **/

class View {
     private $options = array();
     public function setOptions($key,$value){
          $this->options[$key] = $value;
     }     
}