<?php


class BaseModel extends Response
{
    protected $table_name;

    public function __construct()
    {

        //Overwrite JsonResponse __construct
    }

    public function __call($name, $arguments)
    {
        return $this->error("Action ($name) is not exist.", $arguments);
    }


    public function action($action, $data) {
        return $this->{$action}($data);
    }
}