<?php


namespace PHPMVC\Models;

class Ads extends AbstractModel {
    public $ad_id;
    public $ad_desc;
    public $user_id;
    public $image;
    static $primaryKey='ad_id';
    public static $tableName='ads';
    public static $tableSchema=array(
        'ad_desc'      => self::DATA_TYPE_STR,
        'user_id'       => self::DATA_TYPE_INT,
	    'image'         => self::DATA_TYPE_STR
    );

    public function __construct($ad_desc,$user_id){
        $this->ad_desc=$ad_desc;
        $this->user_id=$user_id;
    }
    public function __get($nameProp){
       return $this->$nameProp;
    }
    public function setId($id){
        $this->ad_desc='new';
        $this->ad_id=1;
    }

}