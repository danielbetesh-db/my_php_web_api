<?php



class ProjectsController extends BaseController
{

    public function createProjectAction()
    {
        $this->request('POST', ['account_id', 'project_name', 'page_url', 'response_page', 'error_page', 'emails'], ['ProjectsModel', 'createProject']);
    }

    public function readAllProjectsAction(){
        $uri = $this->getUriSegments();
        if(!isset($uri['get_id'])){
            $this->sendOutput(new ResponseError(false, 'ID is missing', [$uri]));
        }else{
            $this->request('GET', [], ['ProjectsModel', 'readAllProjects'], ['account_id' => $uri['get_id']]);
        }

    }

    public function updateProjectAction(){
         $this->request('PUT', ['project_id', 'project_name', 'page_url', 'response_page', 'error_page', 'emails'], ['ProjectsModel', 'updateProject']);
    }

    public function deleteProjectAction(){
        $this->request('DELETE', ['project_id'], ['ProjectsModel', 'deleteProject']);
    }



}