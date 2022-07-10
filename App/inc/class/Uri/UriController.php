<?php


class UriController extends Uri {

    public static function get()
    {

        return isset(parent::get()[URI_CONTROLER]) && parent::get()[URI_CONTROLER] ? parent::get()[URI_CONTROLER] : '';
    }

}
