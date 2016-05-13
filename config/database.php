<?php
/**
 * Database config file
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseMVC
 * @subpackage Config
 **/

return [
     /**
      * List of database drivers, To enable multiple database connection you must
      * put the connection details inside an child array.
      **/
     'drivers'  =>   [          
          'mysql'   =>   [
               'host'    =>   _getenv('DB_HOST', 'localhost'),
               'schema'  =>   _getenv('DB_SCHEMA', 'basemvcdb'),
               'user'    =>   _getenv('DB_USER', 'root'),
               'password'=>   _getenv('DB_PASSWORD', 'ambotlang'),
               'prefix'  =>   _getenv('DB_PREFIX', 'bm_')
          ]
     ],
     /**
      * Select database driver, option are selected based from drivers list
      **/
     'database_driver' => 'mysql'
];