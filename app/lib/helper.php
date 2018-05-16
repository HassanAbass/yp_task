<?php
/**
 * Created by PhpStorm.
 * User: subscriber
 * Date: 6/17/17
 * Time: 1:39 AM
 */

namespace PHPMVC\LIB;


trait Helper{
    public function redirect($path = ''){
        header('location:'.$_SERVER['HTTP_REFERER'].'/'.$path);
        exit;
    }

}