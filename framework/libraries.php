<?php

namespace Framework{

    class Libraries extends Initialization{

        protected $core = array();

        public function __construct(){
            $this->core = parent::$libraries; // get the core libraries associated to the Initialization class
            $this->loadCoreLibraries();
        }

        private function loadCoreLibraries(){
            try{
                for($i = 0 ; $i < count($this->core); $i++){
                    if(file_exists(parent::$routes["libraries"].$this->core[$i]. ".php")){
                        require_once(parent::$routes["libraries"] . $this->core[$i] . ".php");
                    }else{
                        array_push(parent::$errors,"Failed to load the core library: ".$this->core[$i]);
                    }
                }
            }catch(Exception $ex){
                array_push(parent::$errors,"Something went wrong: ".$ex);
            }

        }





    }

}

?>