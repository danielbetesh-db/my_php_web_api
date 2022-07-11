<?php

class UriGetID extends Uri {

    public static function get($append = '')
    {
        return isset(parent::get()[URI_ID]) && parent::get()[URI_ID] ? parent::get()[URI_ID] . $append : '';
    }

}