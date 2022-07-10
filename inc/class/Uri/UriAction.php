<?php


class UriAction extends Uri {

    public static function get()
    {
        return isset(parent::get()[URI_ACTION]) && parent::get()[URI_ACTION] ? parent::get()[URI_ACTION] : '';
    }

}