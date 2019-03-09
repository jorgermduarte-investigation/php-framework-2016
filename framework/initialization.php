<?php

namespace Framework{
 
    class Initialization{
        
        /**
         * Setting the property static in the variable, makes it to be part of the class and not to the object initializated.
         * Same thing happens when we want to class a function static without the need of the class initialization(object)
         * */

        protected static $middlewares = array(); //core middlewares
        protected static $libraries = array(); //core libraries
        protected static $routes = array(); //core routes
        
        protected static $middlewaresCustom = array();
        protected static $librariesCustom = array();
        protected static $servicesCustom = array();

        protected $session = null;

        public static $errors = array();

        public function __construct($middlewares, $libraries,$routes){
            self::$middlewares = $middlewares;
            self::$libraries = $libraries;
            self::$routes = $routes;
        }

    }




}


?>