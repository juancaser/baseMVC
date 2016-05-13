<?php namespace BaseMVC;
/**
 * Base Model
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseMVC
 * @subpackage Core
 **/

abstract class Model extends \BaseMVC\Database\Connection{
     protected $table;
     protected $fillable;
     protected $read_only;
     
<<<<<<< HEAD
     function init_connection(){          
=======
     function init_connection(){
          
>>>>>>> a942da8e19187432051b003fc2bdd20880166807
     }     
}