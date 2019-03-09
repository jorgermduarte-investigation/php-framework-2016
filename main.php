<?php
$project_path = __DIR__;

/**
 * Configurations
 */

//define the routes of the application
$routes = array(
    "middlewares" => $project_path . "/middlewares/",
    "libraries" => $project_path . "/libraries/",
    "services" => $project_path . "/services/",
    "framework" => $project_path . "/framework/",
);

//Load the core libraries of the application/project
$libraries = array(
    "test"
);

//Load the core middlewares of the application/project
$middlewares = array(
    "IsAuthenticated"
);

/**
 * Framework Initialization
 */

require($routes["framework"] . "initialization.php");
require($routes["framework"] . "libraries.php");
require($routes["framework"] . "middlewares.php");

use \Framework\Initialization as Framework;
use \Framework\Libraries as Libraries;
use \Framework\Middlewares as Middlewares;

$framework = new Framework(
    $middlewares, //Core middlewares
    $libraries, //Core Libraries
    $routes, //Core Routes
);

$framework_libraries = new Libraries();
$framework_middlewares = new Middlewares();

print_r(Framework::$errors);

?>