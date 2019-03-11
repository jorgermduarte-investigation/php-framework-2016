<?php

namespace Framework{

    class Services extends \Framework\Initialization{

        protected $core = array();

        public function __construct(){
            
            $this->core = parent::$services; // get the core services associated to the Initialization class
            
            $this->loadCoreServices();
        }

        private function loadCoreServices(){
            try{
                for($i = 0 ; $i < count($this->core); $i++){
                    if(file_exists(parent::$paths["services"].$this->core[$i]. ".php")){
                        require_once(parent::$paths["services"] . $this->core[$i] . ".php");
                    }else{
                        array_push(parent::$errors,"Failed to load the core service: ".$this->core[$i]);
                    }
                }
            }catch(Exception $ex){
                array_push(parent::$errors,"Something went wrong: ".$ex);
            }

        }

    }

}

?>