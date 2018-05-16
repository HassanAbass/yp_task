<?php

namespace PHPMVC\LIB;
class AutoLoad{
    public static function autoload($className){
        //include the path of the class file to be included .
        $className=str_replace('\\',DS,str_replace('phpmvc','',strtolower(APP_PATH.$className.'.php')));
        if(file_exists($className))
            require_once  $className;
    }
}
spl_autoload_register(__NAMESPACE__ .'\AutoLoad::autoload');