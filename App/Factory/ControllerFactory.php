<?php


class ControllerFactory extends BaseController
{
    public function projectsController(){ return new ProjectsController($this->request);  }
    public function accountController(){ return new AccountController($this->request);  }
}