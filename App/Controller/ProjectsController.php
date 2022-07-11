<?php



class ProjectsController extends BaseController
{

    private $model;
    public function __construct(Request $request)
    {   parent::__construct($request);
        $this->model = new ProjectsModel();
    }

    public function createProjectAction()
    {
        $this->request('POST', CREATE_PROJECTS_FIELDS, $this->model);
    }

    public function readAllProjectsAction(){
        $this->request('GET', [/* Get only 1 parameter - $id from uri */], $this->model);
    }

    public function updateProjectAction(){

         $this->request('PUT', UPDATE_PROJECTS_FIELDS, $this->model);
    }

    public function deleteProjectAction(){
        $this->request('DELETE', DELETE_PROJECTS_FIELDS, $this->model);
    }



}


