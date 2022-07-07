<?php

require __DIR__ . "/inc/bootstrap.php";


setCors();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

if (!isset($uri[3])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

$controller_name = $uri[2];
$action_name = $uri[3] . 'Action';

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
