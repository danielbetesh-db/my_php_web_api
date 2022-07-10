<?php



class AccountController extends BaseController
{

    private $model;
    public function __construct(Request $request)
    {
        $this->model = new AccountModel();
        parent::__construct($request);
    }

    public function createAccountAction()
    {
        $this->request('POST', CREATE_ACCOUNT_FIELDS, $this->model);
    }

    public function loginAction(){
        $this->request('POST', LOGIN_FIELDS, $this->model);
    }


}