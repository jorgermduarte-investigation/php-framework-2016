<?php
$project_path = __DIR__;

/**
 * Configurations
 */

//define the routes of the application
$paths = array(
    "middlewares" => $project_path . "/middlewares/",
    "libraries" => $project_path . "/libraries/",
    "framework" => $project_path . "/framework/",
    "layouts" => $project_path . "/app/layouts/",
    "fragments" => $project_path . "/app/fragments/",
    "components" => $project_path . "/app/components/"
);

//Load the core libraries of the application/project
$libraries = array(
    "utils"
);

//Load the core middlewares of the application/project
$middlewares = array(
    "isInMaintenance"
);

/**
 * Framework Initialization
 */

require($paths["framework"] . "initialization.php");
require($paths["framework"] . "libraries.php");
require($paths["framework"] . "middlewares.php");
require($paths["framework"] . "pagebuilder.php");

use \Framework\Initialization as Framework;
use \Framework\Libraries as Libraries;
use \Framework\Middlewares as Middlewares;
use \Framework\PageBuilder as PageBuilder;

$framework = new Framework(
    $middlewares, //Core middlewares
    $libraries, //Core Libraries
    $paths //Core Paths
);

$framework_libraries = new Libraries();
$framework_middlewares = new Middlewares();
$PageBuilder = new PageBuilder();

?>