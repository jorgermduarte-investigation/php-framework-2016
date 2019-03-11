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
        protected static $services = array(); //core libraries
        protected static $paths = array(); //core paths
        
        public static $loaded = array(); // provide all the libraries/middlewares loaded
        
        public static $midls = []; // setted to provide the user to use middlewares in the page later on
        public static $libs = []; // setted to provide the user to use libraries in the page later on
        public static $servs = []; // setted to provide the user to use services in the page later on

        // protected static $middlewaresCustom = array();
        // protected static $librariesCustom = array();
        // protected static $servicesCustom = array();

        protected $session = null;

        public function __construct($middlewares, $libraries,$services,$paths){
            self::$middlewares = $middlewares;
            self::$libraries = $libraries;
            self::$services = $services;
            self::$paths = $paths;
        }

        public function setCustomMiddleware($target){
            try{
                if(file_exists(self::$paths["middlewares"] .$target . ".php"))
                    require_once(self::$paths["middlewares"] .$target . ".php");
                else
                    array_push(self::$errors,"Failed to load custom middleware: " .$target);
            }catch(Exception $ex){
                array_push(self::$errors,"Something went wrong: ".$ex);
            }
        }

        public function setCustomLibrary($target){
            try{
                if(file_exists(self::$paths["libraries"] .$target . ".php"))
                    require_once(self::$paths["libraries"] .$target . ".php");
                else
                    array_push(self::$errors,"Failed to load custom library: " .$target);
            }catch(Exception $ex){
                array_push(self::$errors,"Something went wrong: ".$ex);
            }
        }

        public function loadLibrary($name){
            $find = null;
           
            for($i=0; $i < count(self::$libs); $i++){
                if(key(self::$libs[$i]) == $name){
                    $find = self::$libs[$i][$name];
                }
            }
            return $find;
        }

        public function loadMiddleware($name){
            $find = null;

            for($i=0; $i < count(self::$midls); $i++){
                if(key(self::$midls[$i]) == $name){
                    $find = self::$midls[$i][$name];
                }
            }
            return $find;
        }

        
        public function loadService($name){
            $find = null;

            for($i=0; $i < count(self::$servs); $i++){
                if(key(self::$servs[$i]) == $name){
                    $find = self::$servs[$i][$name];
                }
            }
            
            return $find;
        }

        public function info(){
            echo "<pre>";
            print("<b>Libraries/Middlewares Loaded</b></br>");
            print_r(self::$loaded);
            print("<b>Error List</b></br>");
            print_r(self::$errors);
            echo "</pre>";
        }

    }

}
?>