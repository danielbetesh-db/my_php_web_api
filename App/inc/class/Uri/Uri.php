<?php

const URI_CONTROLER = 2;
const URI_ACTION = 3;
const URI_ID = 4;

abstract class Uri {


    protected static $uri;

    public static function get()
    {
        if (!self::$uri) {
            self::$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            self::$uri = explode('/', self::$uri);
        }
        return self::$uri;
    }



}


