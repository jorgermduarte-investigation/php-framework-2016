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
            else
                print_r(parent::$errors);
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
                            break;
                        case "middlewares":
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

        private function setPageLayout($layout){
            if(file_exists(parent::$paths["layouts"]. $layout . ".php")){
                $this->layout = $layout;
            }else{
                $error = $this->handleError("[PageBuilder] Failed to execute the setting[layout] : The layout named ". $layout. " does not exist");
                array_push(parent::$errors,$error);
            }
                
        }

        //function created to allow us customize the errors later on
        private function handleError($error){
            return $error . "</br>";
        }
        
    }

}