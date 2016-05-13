<?php namespace BaseMVC\Facades;
/**
 * View Facade
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseMVC
 * @subpackage Core
 **/

class View extends \BaseMVC\Facade {
     static function getInstance(){
          return new \BaseMVC\Http\View;
     }     
     static function getFacade(){
          return 'view';
     }
}