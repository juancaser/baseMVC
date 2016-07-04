<?php namespace BaseMVC\Support\Facades;
/**
 * Router Facade
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseMVC
 * @subpackage Core
 **/

class Route extends \BaseMVC\Kernel\Facade {     
     /**
      * Facade accessor
      *
      * @var object
      **/
     protected static function getFacadeAccessor(){
          return '\BaseMVC\Http\Router';
     }
}