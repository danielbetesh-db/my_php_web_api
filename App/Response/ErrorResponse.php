<?php



class ErrorResponse extends JsonResponse {
    public $headers; // Send the headers as json only in debug mode

    public function result(){
        return DEBUG_MODE ? parent::result() : '';
    }

    public function get_headers(){
        return (DEBUG_MODE && $this->headers) ? $this->headers : ['HTTP/1.1 404 Not Found'];
    }
}

