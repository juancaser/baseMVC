<?php namespace BaseMVC\Database;
/**
 * Database connection class
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseMVC
 * @subpackage Core
 **/
use BaseMVC\Database\Driver;

class Connection extends Driver{
     protected $table;
     protected $fillable;
     protected $read_only;
     
}