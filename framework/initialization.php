<?php
namespace Framework{
 
    class Initialization{
       
        public static $errors = array();
        
        /**
         * Setting the property static in the variable, makes it to be part of the class and not to the object initializated.
         * Same thing happens when we want to class a function static without the need of the class initialization(object)
         * */
        protected static $middlewares = array(); //core middlewares
        protected static $libraries = array(); //core libraries
        protected static $paths = array(); //core paths
        
        public static $loaded = array(); // provide all the libraries/middlewares loaded
        
        public static $midls = array(); // setted to provide the user to use middlewares in the page later on
        public static $libs = array(); // setted to provide the user to use libraries in the page later on

        protected static $middlewaresCustom = array();
        protected static $librariesCustom = array();
        protected static $servicesCustom = array();

        protected $session = null;

        public function __construct($middlewares, $libraries,$paths){
            self::$middlewares = $middlewares;
            self::$libraries = $libraries;
            self::$paths = $paths;
        }

    }

}
?>