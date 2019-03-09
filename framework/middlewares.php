<?php

namespace Framework{

    class Middlewares extends Initialization{

        protected $core = array();

        public function __construct(){
            $this->core = parent::$middlewares; // get the core middlewares associated to the Initialization class
            $this->loadCoreMiddlewares();
        }

        private function loadCoreMiddlewares(){
            try{
                for($i = 0 ; $i < count($this->core); $i++){
                    if(file_exists(parent::$routes["middlewares"].$this->core[$i]. ".php")){
                        require_once(parent::$routes["middlewares"] . $this->core[$i] . ".php");
                    }else{
                        array_push(parent::$errors,"Failed to load the core middleware: ".$this->core[$i]);
                    }
                }
            }catch(Exception $ex){
                array_push(parent::$errors,"Something went wrong: ".$ex);
            }

        }





    }

}

?>