<?php


class ControllerFactory extends BaseController
{
    public function instance()
    {
        $controller_cls = UriController::get() . "Controller";
        if(class_exists($controller_cls)){
            return new $controller_cls($this->request);
        }else {
            Response::error('Could not find controller', $controller_cls)->send_output();
        }
    }


}