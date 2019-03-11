<?php

namespace Framework{

    class PageBuilder extends Initialization{

        protected $layout = "error";
        public    $pageName = "";
        private   $components = array();
        private   $settings = array();

        public function __construct(){
        }

        /**
         * Create the page based on the name, components and settings
         * @param string $name Page Name
         * @param array $components Array list of the components that the page require
         * @param array $settings Array list of the settings of the page.
         */

        public function build($name = "Unknown",$components = null,$settings = null){

            $this->pageName = $name;
            $this->settings = $settings;
            $this->components = $components;
            
            $this->handleSettings();

            if(count(parent::$errors) == 0)
                $this->generate();
            // else
            //     print_r(parent::$errors);
        }

        private function generate(){
            include(parent::$paths["layouts"] . $this->layout . '.php');
        }

        private function handleSettings(){
            if($this->settings != null && is_array($this->settings)){
                foreach($this->settings as $setting => $value){
                    switch($setting){
                        case "layout":
                            $this->setPageLayout($value); 
                            break;
                        case "libraries":
                            $this->executeLibraries($value);
                            break;
                        case "middlewares":
                            $this->executeMiddlewares($value);
                            break;
                        case "permission":

                            break;
                        default:
                            $error = $this->handleError("[PageBuilder] Failed to execute the setting: " . $setting);
                            array_push(parent::$errors,$error);
                    }
                }
            }
        }

        public function executeMiddlewares($list){
            if($list != "" && is_array($list)){
                for($i = 0 ; $i < count($list); $i++){
                    parent::setCustomMiddleware($list[$i]);
                }
            }else if($list != "")
                parent::setCustomMiddleware($list[$i]);
        }

        public function executeLibraries($list){
            if($list != "" && is_array($list)){
                for($i = 0 ; $i < count($list); $i++){
                    parent::setCustomLibrary($list[$i]);
                }
            }else if($list != "")
                parent::setCustomLibrary($list[$i]);
        }

        private function setPageLayout($layout){
            if(file_exists(parent::$paths["layouts"]. $layout . ".php")){
                $this->layout = $layout;
            }else{
                $error = $this->handleError("[PageBuilder] Failed to execute the setting[layout] : The layout named ". $layout. " does not exist");
                array_push(parent::$errors,$error);
            }
                
        }

        public function setComponents(){
            if(count($this->components) > 0){
                for($i =0 ;  $i < count($this->components) ; $i++){
                    if(file_exists(self::$paths["components"] .$this->components[$i] . ".php"))
                        include(self::$paths["components"] .$this->components[$i] . ".php");
                    else
                        array_push(parent::$errors,"Failed to execute the component: " . $this->components[$i] );
                }
            }
        }

        public function setComponent($name){
            if(file_exists(self::$paths["components"] . $name . ".php"))
                include(parent::$paths["components"].  $name . ".php");
            else
                array_push(parent::$errors,"Failed to execute the component: " . $name );
        }
        
        //function created to allow us customize the errors later on
        private function handleError($error){
            return $error . "</br>";
        }
        
    }

}