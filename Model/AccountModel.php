<?php

require_once PROJECT_ROOT_PATH . "inc/class/DataBase.php";


class AccountModel extends BaseModel
{


    public function login($request){
        /**
         * extract variables
         *
         * @var $email
         * @var $password
         */
        extract($request);
        $db = DataBase::get_instance();
        if($db->select_query(ACCOUNTS_TABLE_NAME, $request)->numRows() == 1){
            return $this->success('', $db->fetchArray());
        }else{
            return $this->error('Account not exist.');
        }
    }



    public function createAccount($request){
        /**
         * extract variables
         *
         * @var $first_name
         * @var $last_name
         * @var $email
         * @var $password
         */
        extract($request);
        $db = DataBase::get_instance();
        $rows = $db->select_query(ACCOUNTS_TABLE_NAME, ['email' => $email])->numRows();
        if($rows == 0){
            $db->insert_query(ACCOUNTS_TABLE_NAME, $request);

            if($db->affectedRows() == 1){
                return $this->success("Account ($email) has been created.");
            }else{
                return $this->error('SQL error', $db->lastQuery());
            }

        }else{
            return $this->error('Email already exist.');
        }
    }





}