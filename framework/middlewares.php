<?php

namespace Framework{

    class Middlewares extends Initialization{

        $core = array();
        $errors = array();

        public function __construct($middlewares){
            $this->core = $middlewares;
            $this->loadCoreMiddlewares();
        }

        private function loadCoreMiddlewares(){
            try{
                
                for($i = 0 ; $i < count($this->core); $i++){
                    // if(file_exists(parent::$routes["LIBRARIES"].$this->core[$i]. ".php")){
                    //     require_once(parent::$routes["LIBRARIES"] . $this->core[$i] . ".php");
                    // }else{
                    //     array_push($this->errors,"Failed to load the Core Library: ".$this->core[$i]);
                    // }
                }

            }catch(Exception $ex){
                array_push($this->errors,"Something went wrong: ".$ex);
            }

        }





    }

}

?>