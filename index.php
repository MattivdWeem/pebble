<?php

/*
 *
 *    Default settings file, these settings will be loaded into the bootstrap
 *
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

$settings = [

    'app' => [
        'directory' => __DIR__.'/App/',
        'bootstrap' => 'Bootstrap.php'
    ],

    'vendor' => [
        'directory' => __DIR__.'/vendor/',
        'loader' => 'autoload.php'
    ]

];



// boot up the bootstrap!
include($settings['app']['directory'].$settings['app']['bootstrap']);


