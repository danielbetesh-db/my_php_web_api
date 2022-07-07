<?php



class ProjectsController extends BaseController
{

    public function createProjectAction()
    {
        $this->request('POST', ['project_name', 'page_url', 'response_page', 'error_page', 'emails'], ['ProjectsModel', 'createProject']);
    }

    public function readAllProjectsAction(){
        $this->request('GET', ['account_id'], ['ProjectsModel', 'readAllProjects']);
    }

    public function updateProjectAction(){
         $this->request('PUT', ['project_id', 'project_name', 'page_url', 'response_page', 'error_page', 'emails'], ['ProjectsModel', 'updateProject']);
    }

    public function deleteProjectAction(){
        $this->request('DELETE', ['project_id'], ['ProjectsModel', 'deleteProject']);
    }



}