<?php

require __DIR__ . "/inc/bootstrap.php";


setCors();
$uri = BaseController::getUriSegments();

if (!isset($uri['action'])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

$controller_name = $uri['controller'];
$action_name = $uri['action'] . 'Action';

switch ($controller_name){
    case 'account' :
        require PROJECT_ROOT_PATH . "/Controller/Api/AccountController.php";
        $objFeedController = new AccountController();
        break;
    case 'projects' :
        require PROJECT_ROOT_PATH . "/Controller/Api/ProjectsController.php";
        $objFeedController = new ProjectsController();
        break;
    default:
        header("HTTP/1.1 404 Not Found");
        exit();
        break;
}

$objFeedController->{$action_name}();
