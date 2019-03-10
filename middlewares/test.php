<?php

class middleware_test extends \Framework\Initialization{

    private $MiddlewareName = "test";

    function __construct(){
        //push the middleware to the loaded array of the Initialization Class
        array_push(parent::$loaded, $this->MiddlewareName . " Middleware Loaded");
        $this->testfunction();
    }

    private function testfunction(){
    }

    public function executionExample(){
        echo "I have been executed !";
    }

}

//add the middleware to the load provider ( allows to call respective functions on the pages )
array_push(self::$midls, array("test" =>  new middleware_test()) );

?>