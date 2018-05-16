<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
ob_start();
if(!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}
define('APP_PATH',realpath(dirname(__FILE__)));
define('STYLESHEET','/'.explode('/',getcwd()) [ count(explode('/',getcwd()))-2 ].'/app/views/assets/');
define('APP_ROOT','/'.explode('/',getcwd()) [ count(explode('/',getcwd()))-2 ].'/');
define('PUBLIC_PATH', '/'.explode('/',getcwd()) [ count(explode('/',getcwd()))-2 ].'/public/');
define('VIEW_PATH',APP_PATH.DS.'views'.DS);
defined('DATABASE_HOST_NAME')       ? null: define('DATABASE_HOST_NAME','database_host');
defined('DATABASE_USER_NAME')       ? null: define('DATABASE_USER_NAME','username');
defined('DATABASE_PASSWORD')        ? null: define('DATABASE_PASSWORD','password');
defined('DATABASE_DB_NAME')         ? null: define('DATABASE_DB_NAME','php_pdo');
defined('DATABASE_PORT_NUMBER')     ? null: define('DATABASE_PORT_NUMBER',3306);
defined('DATABASE_CONN_DRIVER')     ? null: define('DATABASE_CONN_DRIVER',1);