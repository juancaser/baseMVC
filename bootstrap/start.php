<?php
/**
 * baseMVC
 *
 * Loads and initialize the MVC framework
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package baseMVC
 * @subpackage bootstrap
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

/**
 * Vendor autoloader
 *
 * @version 1
 **/
include(dirname(__DIR__).'/vendor/autoload.php');

/**
 * Let's use baseMVC app
 **/
use \BaseMVC\Support\Facades\App;
use \BaseMVC\Support\Facades\Config;
use \BaseMVC\Support\Helper\File;
use \BaseMVC\Support\Facades\Route;

App::action('before', function(){
    File::inc('app.init');
});

App::action('middle', function(){
    if(!File::load('app.router')) exit();    
});

App::action('after', function(){
    Route::run();
});
//Config::get('app.title');
App::init();