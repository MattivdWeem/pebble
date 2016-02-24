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


        /*
         *  When multi route is enabled, a route will be checked multiple times so multiple routes can match a url
         *  default turned to false.
         * */
        'multiRoute' => false,


        // leave everything beyond here intact, these are the loading files
        'directory' => __DIR__.'/App/',
        'bootstrap' => 'Bootstrap.php',


    ],

    // composer stuff, you can overwrite this if you want your own autoloader
    'vendor' => [
        'directory' => __DIR__.'/vendor/',
        'loader' => 'autoload.php'
    ],


    // registered helpers
    'helpers' => [
        'template' => [
            'path' => 'League\Plates\Engine',
            'arguments' =>[
                    __DIR__.'/public/views/'
                ]
            ],
        'http' => [
            'path' => 'App\Helpers\HttpHelper',
            'arguments' => []
        ],
        'logger' => [
            'path' => 'App\Helpers\Logger',
            'arguments' => [
                __DIR__.'/log.txt'
            ]
        ]

    ]

];



// boot up the bootstrap!
require($settings['app']['directory'].$settings['app']['bootstrap']);


