<?php namespace BaseDB;
/**
 * Database connection class
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseMVC
 * @subpackage Core
 **/
use BaseDB\Driver;

class Connection extends Driver{
     protected $table;
     protected $fillable;
     protected $read_only;
     
}