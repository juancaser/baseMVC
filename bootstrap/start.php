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

/**
 * Vendor autoloader
 *
 * @version 1
 **/
include(dirname(__DIR__).'/vendor/autoload.php');