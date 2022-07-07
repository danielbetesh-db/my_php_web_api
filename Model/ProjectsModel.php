<?php

require_once PROJECT_ROOT_PATH . "/Model/Database.php";

class ProjectsModel
{
    private static $table_name = 'Projects';

    public static function login($request){
        /**
         * @var $Email
         * @var $Password
         */
        extract($request);
        $db = DataBase::getInstance();
        $rows = $db->query("SELECT * FROM ".self::$table_name." WHERE email='$Email' AND password='$Password'")->numRows();
        if($rows == 1){
            return new ResponseJson(true, '', $db->fetchArray());
        }else{
            return new ResponseJson(false, 'Account not exist.', []);
        }
    }

    public static function readAllProjects($request){
        /**
         * @var account_id
         */
        extract($request);
        $db = DataBase::getInstance();
        $db->query('SELECT * FROM '.self::$table_name);
        return new ResponseJson(true, '', $db->fetchAll());
    }


    public static function createProject($request){
        /**
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
                    (project_name, page_url, response_page, error_page, emails) 
                VALUES 
                    ('$project_name', '$page_url', '$response_page', '$error_page', '$emails')
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