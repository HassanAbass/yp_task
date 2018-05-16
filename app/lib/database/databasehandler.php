<?php
namespace PHPMVC\LIB\Database;

abstract class DatabaseHandler
{
    const DATABASE_DRIVER_PDO       = 1;
    const DATABASE_DRIVER_MYSQLI    = 2;

    public static function init(){

        try{
            return  new \PDO('mysql://hostname='.DATABASE_HOST_NAME.';dbname='.DATABASE_DB_NAME,
                DATABASE_USER_NAME,
                DATABASE_PASSWORD,
                array(
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ));
        }catch (\PDOException $e){
            return $e->getMessage();
        }

    }


}