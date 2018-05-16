<?php 
namespace PHPMVC;
use PHPMVC\LIB\A1;
use PHPMVC\LIB\FrontController;
if(!defined('DS'))
    define('DS',DIRECTORY_SEPARATOR);
require_once '..'.DS.'app'.DS.'config.php';
require_once APP_PATH.DS.'lib'.DS.'autoload.php';


$frn=new FrontController();
$frn->Dispatch();