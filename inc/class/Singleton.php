<?php


class Singleton{

    private static $instances = [];

    public static function get_instance(){

        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

}