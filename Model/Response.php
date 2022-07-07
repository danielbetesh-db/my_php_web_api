<?php

interface IResponse{
    public function result();

    public function get_headers();
}


class ResponseBase implements IResponse
{
    public $success;
    public $message;
    public $data;

    protected $headers;

    public function __construct($success = false, $message = '', $data = [], $headers = null)
    {
        $this->success = $success;
        $this->message = $message;
        $this->data = $data;
        $this->headers = $headers;
    }

    public function result(){
        return $this;
    }

    public function get_headers(){
        return $this->headers;
    }
}

class ResponseJson extends ResponseBase{

    public function result(){
        return json_encode(parent::result());
    }

    public function get_headers(){
        return ['Content-Type: application/json', 'HTTP/1.1 200 OK'];
    }
}


class ResponseError extends ResponseJson{
    public $headers; // Send the headers as json only in debug mode

    public function result(){
        return DEBUG_MODE ? parent::result() : '';
    }

    public function get_headers(){
        return (DEBUG_MODE && $this->headers) ? $this->headers : ['HTTP/1.1 404 Not Found'];
    }
}
