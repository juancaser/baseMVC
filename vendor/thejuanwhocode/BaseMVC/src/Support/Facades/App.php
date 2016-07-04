<?php namespace BaseMVC\Support\Facades;
/**
 * Router Facade
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseMVC
 * @subpackage Core
 **/

class App extends \BaseMVC\Kernel\Facade{
    /**
     * Get the registered name of the component.
     *
     * @return string
     **/
     protected static function getFacadeAccessor() {
          return '\BaseMVC\Kernel\App';
     }
}
