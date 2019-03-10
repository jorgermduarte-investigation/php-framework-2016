<?php
    require('../main.php');
    require_once('../enumerators/permissions.php');

    $PageBuilder->build(
        "Page Name", //page Name
        array( //execute the respective components

        ), 
        array( //settings for the page
            "libraries" => array(
              "yo"
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