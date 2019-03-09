<?php

class middleware_isInMaintenance extends \Framework\Initialization{

    private $MiddlewareName = "IsInMaintenance";
    public $maintenanceMode = false;

    function __construct(){
        //push the middleware to the loaded array of the Initialization Class
        array_push(parent::$loaded, $this->MiddlewareName . " Middleware Loaded");
        $this->verify_maintenance();
    }

    private function verify_maintenance(){
    }

}

//add the middleware to the load provider ( allows to call respective functions on the pages )
array_push(self::$midls, array("IsInMaintenance" =>  new middleware_isInMaintenance()) );

?>