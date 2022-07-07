<?php

require_once PROJECT_ROOT_PATH . "/Model/Database.php";


class AccountModel
{
    private static $table_name = 'Accounts';

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



    public static function createAccount($request){
        /**
         * @var $FirstName
         * @var $LastName
         * @var $Email
         * @var $Password
         */
        extract($request);
        $db = DataBase::getInstance();
        $rows = $db->query("SELECT * FROM ".self::$table_name." WHERE email='$Email'")->numRows();
        if($rows == 0){
            $db->query("
                INSERT INTO ".self::$table_name." 
                    (first_name, last_name, email, password) 
                VALUES 
                    ('$FirstName', '$LastName', '$Email', '$Password')
                ");
            return new ResponseJson(true, '', []);
        }else{
            return new ResponseJson(false, 'Email already exist', []);
        }
    }





}