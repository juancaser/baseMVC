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
use BaseMVC\Support\Facades\App;

App::action('before', function(){
     echo __FILE__.'<br/>';
});


App::action('middle', function(){
     
});


App::action('after', function(){
     
});
