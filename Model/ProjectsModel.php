<?php

require_once PROJECT_ROOT_PATH . "/Model/Database.php";

class ProjectsModel
{
    private static $table_name = 'Projects';


    public static function readAllProjects($request){
        /**
         * @var $account_id
         */
        extract($request);
        $db = DataBase::getInstance();
        $db->query("SELECT * FROM ".self::$table_name." WHERE account_id=".$account_id);
        $message = $db->numRows() . ' rows';
        $data = $db->fetchAll();
        return new ResponseJson(true, $message, $data);

    }


    public static function createProject($request){
        /**
         * @var $account_id
         * @var $project_name
         * @var $page_url
         * @var $response_page
         * @var $error_page
         * @var $emails
         */
        extract($request);
        $db = DataBase::getInstance();
        $rows = $db->query("SELECT * FROM ".self::$table_name." WHERE project_name='$project_name'")->numRows();
        if($rows == 0){
            $db->query("
                INSERT INTO ".self::$table_name." 
                    (account_id, project_name, page_url, response_page, error_page, emails) 
                VALUES 
                    ('$account_id', '$project_name', '$page_url', '$response_page', '$error_page', '$emails')
                ");
            return new ResponseJson(true, 'Project has been created.', ['affectedRows' => $db->affectedRows()]);
        }else{
            return new ResponseJson(false, 'Project name already exist', []);
        }
    }

    public static function deleteProject($request){
        /**
         * @var project_id
         */
        extract($request);
    }





}