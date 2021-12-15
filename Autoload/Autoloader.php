<?php

namespace Autoload;

class Autoloader{

    public static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class){
      $nameSpace = explode('\\', $class);
      $nameSpace = array_map('strtolower', $nameSpace);
      $cpt = count($nameSpace) - 1;
      $nameSpace[$cpt] = ucfirst($nameSpace[$cpt]);      
      $class = implode('/', $nameSpace);
      require $class.'.php';
    }

}