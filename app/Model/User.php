<?php namespace App\Model;

class User extends \BaseDB\Model {
    protected $table = 'user';
    
    function test(){
        echo $this->table;
    }
}
