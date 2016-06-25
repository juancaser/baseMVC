<?php namespace BaseDB;
/**
 * Base Model
 *
 * @author TheJuanWhoCode <caserjan@gmail.com>
 * @version 1
 * @package BaseDB
 * @subpackage Core
 **/

abstract class Model extends \BaseDB\Connection{
     protected $table;
     protected $fillable;
     
     private $fields = array();
     private $limit_row_count;
     private $limit_offset;
     private $where;
     
     
     /**
      * Magic methods
      **/
     public function __set($name,$value){
          if($this->isFillable($name)){
               $this->fields[$name] = $value;
          }
     }
     
     /**
      * CRUD
      **/
     /**
      * Inserts new row
      * 
      * @return int Last inserted id
      **/
     public function save(){
     }
     
     /**
      * Updates row, to be used in conjunction with where filter
      **/
     public function update(){
     }
     
     /**
      * Return single row base from index
      *
      * @param int $integer Row primary index
      * @return array
      **/
     public function find($index){          
     }
     
     /**
      * Return multiple rows, to be used in conjunction with where and limit filter
      *
      * @return array
      **/
     public function get(){          
     }
     
     /**
      * Limit returned rows
      *
      * @param int $row_count
      * @param int $offset
      **/
     public function limit($row_count = 10,$offset = null){
          $this->limit_offset = $row_count;
          $this->limit_row_count = $offset;
          return $this;
     }
     
     public function where(){
          $args = func_get_args();          
     }
     
     /**
      * Private functions
      **/
     private function isFillable($column){
          if(!is_null($this->fillable)){
               if(array_key_exists($column,$this->fields)){
                    return true;
               }else{
                    return false;
               }
          }else{
               return true;
          }          
     }
     
     private function addWhereFilter($where,$type = 'and'){
          if(is_null($this->where)) $this->where = array();
          if(!isset($this->where[$type])) $this->where[$type] = array();
          $this->where[$type] = $where;          
     }
}