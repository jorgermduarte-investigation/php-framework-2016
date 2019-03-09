<?php
    require('../main.php');
    require_once('../enumerators/permissions.php');

    $PageBuilder->build(
        "Page Name", //page Name
        array(), //execute the respective component
        array( //settings for the page
            "libraries" => array(), // load custom libraries
            "middlewares" => array(), //load custom middlewares for this page
            "permission" => ENUM_PERMISSIONS::Member,
            "layout" => "default"
        )
    );
?>