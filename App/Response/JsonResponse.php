<?php


class JsonResponse extends BaseResponse {

    public function result(){
        return json_encode(parent::result());
    }

    public function get_headers(){
        return ['Content-Type: application/json', 'HTTP/1.1 200 OK'];
    }
}
