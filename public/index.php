<?php
    require('../main.php');
    require_once('../enumerators/permissions.php');

    $PageBuilder->build(
        "Page Name", //page Name
        array( //load components 
            "test"
        ), 
        array( //settings for the page
            "libraries" => array(
                // "test"
            ), // load custom libraries
            "middlewares" => array(  //load custom middlewares for this page
                "test"
            ),
            "permission" => ENUM_PERMISSIONS::Member,
            "layout" => "default"
        )
    );

    $framework::info();
    // $testmiddleware = $framework::loadMiddleware("test");
    // $testmiddleware->executionExample();
?>