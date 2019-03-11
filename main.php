<?php
$project_path = __DIR__;

/**
 * Configurations
 */

//define the routes of the application
$paths = array(
    "configurations" => $project_path . "/configurations/",
    "middlewares" => $project_path . "/middlewares/",
    "services" =>  $project_path . "/services/",
    "libraries" => $project_path . "/libraries/",
    "framework" => $project_path . "/framework/",
    "layouts" => $project_path . "/app/layouts/",
    "fragments" => $project_path . "/app/fragments/",
    "components" => $project_path . "/app/components/"
);

$GLOBALS["app_paths"] = array(
    "css" => "/css/",
    "js" => "/js/"
);

//Load the core libraries of the application/project
$libraries = array(
    "utils"
);

//Load the core middlewares of the application/project
$middlewares = array(
    "isInMaintenance"
);

$services = array(
    "queryhelper"
);

/**
 * Framework Initialization
 */

require($paths["framework"] . "initialization.php");
require($paths["framework"] . "libraries.php");
require($paths["framework"] . "middlewares.php");
require($paths["framework"] . "services.php");
require($paths["framework"] . "pagebuilder.php");

use \Framework\Initialization as Framework;
use \Framework\Libraries as Libraries;
use \Framework\Services as Services;
use \Framework\Middlewares as Middlewares;
use \Framework\PageBuilder as PageBuilder;

$framework = new Framework(
    $middlewares, //Core middlewares
    $libraries, //Core Libraries
    $services, // Core Services
    $paths //Core Paths
);

$framework_libraries = new Libraries();
$framework_middlewares = new Middlewares();
$framework_services = new Services();
$PageBuilder = new PageBuilder();

?>