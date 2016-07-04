<?php namespace BaseMVC\Kernel\Exceptions;
/**
 * BaseMVC App
 *
 * Facade Exceptions
 *
 * @author DaJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseMVC
 **/

class FacadeException extends \ReflectionException{}

/**
 * HTTP Exceptions
 **/
class HttpNotFoundException extends \OutOfBoundsException{}