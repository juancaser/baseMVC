<?php
/**
 * baseMVC
 *
 * Initialize any instances globally
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package baseMVC
 * @subpackage app
 **/
use BaseMVC\Facades\App;


App::before(function(){
     echo 'Before';
});
/*
App::middle(function(){
     echo 'Middle';
});

App::after(function(){
     echo 'After';
});
*/
App::init();