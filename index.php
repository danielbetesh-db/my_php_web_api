<?php

require __DIR__ . "/App/inc/bootstrap.php";

$request = Request::get_instance();
/**
 * Allow Cors
 *
 * temporay function
 */
setCors();

/**
 * Validate request {Controller}/{Action}/{ID}
 * Controller and Action is required for all HTTP methods,
 * ID validation will happen only in HTTP GET method
 */
if (!$request->is_valid_uri()) {
    /**
     * The response will only be revealed in debug mode,
     * otherwise an empty response will be obtained.
     */
    Response::error('Uri is not valid')->send_output();
}


/**
 * Create new instance of ControllerFactory with request data
 * and call to controller and action {Controller}/{Action}
 * if one of them not exist it will automatic execute __call function
 * of BaseController
 */
$factory = new ControllerFactory($request);
$factory->{ UriController::get('Controller') }()->{ UriAction::get('Action') }();

