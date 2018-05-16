<?php


namespace PHPMVC\Models;

class User extends AbstractModel{
    public $user_id;
    public $user_name;
    public $password;
    static $primaryKey='user_id';
    public static $tableName='users';
    public static $tableSchema=array(
        'user_name'      => self::DATA_TYPE_STR,
        'password'      => self::DATA_TYPE_STR
    );

    public function __construct($name){
        $this->user_name=$name;
    }
    public function __get($nameProp){
       return $this->$nameProp;
    }
    public function setId($id){
        $this->user_name='new';
        $this->user_id=1;
    }
}