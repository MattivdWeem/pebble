<?php

namespace App\System\Runtime;

class Helpers{

    /**
     * @var array
     */
    static protected $helpers = [];

    /**
     * @param String $name
     * @param $object
     */
    public static function register(String $name ,$object){
        $helpers = self::getHelpers();
        $helpers[$name] = $object;
        self::setHelpers($helpers);
    }

    /**
     * @param $name
     * @return mixed
     */
    public static function instance($name){
        return self::getHelpers()[$name];
    }

    /**
     * @return array
     */
    private static function getHelpers()
    {
        return self::$helpers;
    }

    /**
     * @param array $helpers
     */
    private static function setHelpers($helpers)
    {
        self::$helpers = $helpers;
    }


}