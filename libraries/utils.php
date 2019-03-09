<?php

class library_utils extends \Framework\Initialization{

    private $LibraryName = "Utils";

    function __construct(){
        //push the library to the loaded array of the Initialization Class
        array_push(parent::$loaded, $this->LibraryName . " Library Loaded");
    }

}

//add the library to the load provider ( allows to call respective functions on the pages )
array_push(self::$libs, array("Utils" =>  new library_utils()) );

?>