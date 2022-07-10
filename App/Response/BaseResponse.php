<?php

abstract class BaseResponse extends Singleton
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

    protected function result(){
        return $this;
    }

    protected function get_headers(){
        return $this->headers;
    }

    public function send_output()
    {
        header_remove('Set-Cookie');
        foreach ($this->get_headers() as $httpHeader) {
            header($httpHeader);
        }
        echo $this->result();
        exit;
    }
}