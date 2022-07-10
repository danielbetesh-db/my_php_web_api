<?php

require_once PROJECT_ROOT_PATH . "/inc/class/DataBase.php";

class ProjectsModel extends BaseModel
{
    public function createProject($request){
        /**
         * @var $account_id
         * @var $project_name
         * @var $page_url
         * @var $response_page
         * @var $error_page
         * @var $emails
         */
        extract($request);

        $db = DataBase::get_instance();
        $rows = $db->select_query(PROJECTS_TABLE_NAME, ['project_name' => $project_name, 'account_id' => $account_id])->numRows();
        if($rows == 0){
            $db->insert_query(PROJECTS_TABLE_NAME, $request);
            return $this->success("Project '$project_name' has been created.", ['affectedRows' => $db->affectedRows()]);
        }else{
            return $this->error("Project name '$project_name' already exist", []);
        }
    }


    public function readAllProjects($request){
        /**
         * @var $id
         */

        extract($request);
        $db = DataBase::get_instance()->query("SELECT * FROM ".PROJECTS_TABLE_NAME." WHERE account_id=".$id);
        return $this->success($db->numRows() . ' rows', $db->fetchAll());

    }

    public function updateProject($request){
        /**
         * @var $project_id
         * @var $account_id
         * @var $project_name
         * @var $page_url
         * @var $response_page
         * @var $error_page
         * @var $emails
         */

        extract($request);
        unset($request['account_id']);
        unset($request['project_id']);
        $db = DataBase::get_instance()->update_query(PROJECTS_TABLE_NAME, $request,['account_id' => $account_id, 'project_id' => $project_id]);
        return $this->success("ProjectID : $project_id was updated.", ['affectedRows' => $db->affectedRows()]);
    }


    public function deleteProject($request){
        /**
         * @var $project_id
         * @var $account_id
         */
        extract($request);
        $db = DataBase::get_instance();
        $db->delete_query(PROJECTS_TABLE_NAME, $request);
        if($db->affectedRows()){
            return $this->success("ProjectID $project_id has been deleted.", ['affectedRows' => $db->affectedRows()]);
        }else{
            return $this->success("ProjectID $project_id was not found.", ['affectedRows' => $db->affectedRows()]);
        }
    }







}