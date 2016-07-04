<?php namespace BaseMVC\Kernel;
/**
 * Base Facade
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseMVC
 * @subpackage Core
 * @uses \BaseMVC\Kernel\Registry
 **/

use \BaseMVC\Kernel\Exceptions\FacadeException;

abstract class Facade{
     
    /**
     * Get the registered object of the component.
     *
     * @return string
     *
     * @throws FacadeException
     */
     protected static function getFacadeAccessor() {
          throw new FacadeException('Facade does not implement getFacadeAccessor method.');
     }
     

     /**
      * Resolved and instantiate Facade class
      *
      * @return string
      * @throws FacadeException
      **/
     protected static function resolvedFacadeInst($facade){
          if(!class_exists('\ReflectionClass')) {
               throw new FacadeException('Cannot initialize facade.');
          }
          
          $register = \BaseMVC\Kernel\Registry::getInstance();
          $name = strtolower(pathinfo(str_replace('\\',DIRECTORY_SEPARATOR,$facade),PATHINFO_FILENAME));
          
          if($register->has_var($name)){
               $facadeInst = $register->get_var($name);
          }else{               
               $ref = new \ReflectionClass(static::getFacadeAccessor());
               $facadeInst = $ref->newInstanceWithoutConstructor();
               $register->set_var($name, $facadeInst);
          }          
          return $facadeInst;
     }
     
     /**
      * __callStatic
      *
      * @param string $name
      * @param array $arguments
      *
      * @throws FacadeException
      **/
     public static function __callStatic($name, array $args = null){
          $facadeInst = static::resolvedFacadeInst(static::getFacadeAccessor());
          if(method_exists($facadeInst,$name)){
               if(is_null($args)){
                    return call_user_func([$facadeInst,$name]);
               }else{
                    return call_user_func_array([$facadeInst,$name],$args);                    
               }               
          }else{
                throw new FacadeException('Invalid class method.');
          }
     }
}
