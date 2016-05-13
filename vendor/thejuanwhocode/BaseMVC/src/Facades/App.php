<?php namespace BaseMVC\Facades;
/**
 * Router Facade
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseMVC
 * @subpackage Core
 **/

class App extends \BaseMVC\Facade {
     static function getInstance(){
          return new \BaseMVC\BaseMVC;
     }     
     static function getFacade(){
          return 'app';
     }
}