<?php
/**
 * baseMVC
 *
 * Router lists
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package baseMVC
 * @subpackage app
 **/

use \BaseMVC\Support\Facades\Route;
use \BaseMVC\Support\Facades\View;
use \BaseMVC\Kernel\App;

Route::get('/',function(){
    return View::render('frontend.home',['ambot' => 'lang']);
});


Route::get('blog/(\w+)/(\d+)',function($category, $id){
    return $category.'/'.$id;
});

Route::get('a',[
    'name'     => 'a.page',
    'filter'   => 'user.auth', 
    'callback' => function(){
        exit('a');
    }
]);

Route::get('b',[
    'name'       => 'b.page',
    'controller' => 'TestController@indexb'
]);

Route::get('c','TestController@indexc');

Route::error(function($errno,$errdata){
    if($errno == 404){
        App::header(404);
    }
});