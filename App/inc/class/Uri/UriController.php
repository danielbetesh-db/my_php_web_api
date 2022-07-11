<?php


class UriController extends Uri {

    public static function get($append = '')
    {

        return isset(parent::get()[URI_CONTROLER]) && parent::get()[URI_CONTROLER] ? parent::get()[URI_CONTROLER] . $append : '';
    }

}
