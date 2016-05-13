<?php
/**
 * baseMVC
 *
 * Loads and initialize the MVC framework
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package baseMVC
 * @subpackage bootsrap
 **/

/**
 * Absolute path
 *
 * @version 1
 **/
define('ABSPATH',dirname(__DIR__));

/**
 * Bootstrap Helper
 *
 * @version 1
 **/
include(__DIR__.'/helper.php');
exit();
/**
 * Vendor autoloader
 *
 * @version 1
 **/
include(dirname(__DIR__).'/vendor/autoload.php');

/*$app = \BaseMVC\App::getInstance();
$app->before(function(){
     echo 'Before';
});
$app->run();*/
use \BaseMVC\Facades\Route;
Route::test();
=======
include(dirname(__DIR__).'/vendor/autoload.php');

/**
 * Load/initialize before the system starts
 **/
\BaseMVC\Facades\App::before(function(){
     echo 'Before';
});