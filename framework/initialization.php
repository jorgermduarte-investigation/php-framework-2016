<?php
namespace Framework{
 
    class Initialization{
        
        protected $middlewares = array();
        protected $libraries = array();
        protected $services = array();

        protected $routes = array();
        private $configurations = array();

        protected static $middlewaresCustom = array();
        protected static $librariesCustom = array();
        protected static $servicesCustom = array();

        protected $session = null;

        protected $errorsList = array();

        public function __construct($middlewares,$libraries,$services,$routes,$configurations){
            $middlewares = $middlewares;
            $libraries = $libraries;
            $services = $services;
            $routes = $routes;
            $configurations = $configurations;
        }

    }




}


?>