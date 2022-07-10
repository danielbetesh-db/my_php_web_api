<?php


define("PROJECT_ROOT_PATH", __DIR__ . "/../");

require_once PROJECT_ROOT_PATH . "/inc/utils.php";
require_once PROJECT_ROOT_PATH . "/inc/config.php";
require_once PROJECT_ROOT_PATH . "/inc/class/Singleton.php";


require_once PROJECT_ROOT_PATH . "/Request/BaseRequest.php";
require_once PROJECT_ROOT_PATH . "/Request/Request.php";

require_once PROJECT_ROOT_PATH . "/inc/class/Uri/Uri.php";
require_once PROJECT_ROOT_PATH . "/inc/class/Uri/UriController.php";
require_once PROJECT_ROOT_PATH . "/inc/class/Uri/UriAction.php";
require_once PROJECT_ROOT_PATH . "/inc/class/Uri/UriGetID.php";


require_once PROJECT_ROOT_PATH . "/inc/class/RequestInputs/RequestInputs.php";
require_once PROJECT_ROOT_PATH . "/inc/class/RequestInputs/RequestGetInputs.php";
require_once PROJECT_ROOT_PATH . "/inc/class/RequestInputs/RequestJsonInputs.php";


require_once PROJECT_ROOT_PATH . "/inc/class/Validators/UriRequestValidator.php";
require_once PROJECT_ROOT_PATH . "/inc/class/Validators/JsonRequestValidator.php";

require_once PROJECT_ROOT_PATH . "/Response/BaseResponse.php";
require_once PROJECT_ROOT_PATH . "/Response/JsonResponse.php";
require_once PROJECT_ROOT_PATH . "/Response/ErrorResponse.php";
require_once PROJECT_ROOT_PATH . "/Response/Response.php";

require_once PROJECT_ROOT_PATH . "/Controller/BaseController.php";
require PROJECT_ROOT_PATH . "/Controller/AccountController.php";
require PROJECT_ROOT_PATH . "/Controller/ProjectsController.php";

require_once PROJECT_ROOT_PATH . "/Model/BaseModel.php";
require_once PROJECT_ROOT_PATH . "/Model/AccountModel.php";
require_once PROJECT_ROOT_PATH . "/Model/ProjectsModel.php";

require_once PROJECT_ROOT_PATH . "/Factory/ControllerFactory.php";





