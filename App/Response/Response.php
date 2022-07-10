<?php


class Response extends BaseResponse
{
    private static $instance;

    public static function error($msg = '', $data = [], $headers = []){
        return self::$instance = new ErrorResponse(false, $msg, $data, $headers);
    }

    public static function success($msg = '', $data = [], $headers = []){
        return self::$instance = new JsonResponse(true, $msg, $data, $headers);
    }



}

