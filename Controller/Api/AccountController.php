<?php



class AccountController extends BaseController
{

    public function createAccountAction()
    {
        $this->request('POST', ['FirstName', 'LastName', 'Email', 'Password'], ['AccountModel', 'createAccount']);
    }

    public function loginAction(){
        $this->request('POST', ['Email', 'Password'], ['AccountModel', 'login']);
    }


}