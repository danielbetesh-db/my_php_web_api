<?php

require __DIR__ . "/App/inc/bootstrap.php";

$request = Request::get_instance();

setCors();


if (!$request->is_valid_uri()) {

    Response::error('Uri is not valid')->send_output();
}

$factory = new ControllerFactory($request);
$factory->instance()->{ UriAction::get() . 'Action' }();

