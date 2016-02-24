<?php

use App\System\Runtime\Helpers;

// basic routing
$router->get('/intro/:name',[], 'Home:display');
$router->get('/hello',[], 'Home:displayAnother');

// keep it clean, keep it simple redirecting to no page is no input
$router->get('',[],function($req,$res,$par){
    Helpers::instance('logger')->log('User tried to open main path');
    Helpers::instance('logger')->error('User tried to open main path');
    Helpers::instance('logger')->debug('User tried to open main path');
    Helpers::instance('logger')->warning('User tried to open main path');
    return Helpers::instance('http')->redirect('/intro/'.$_SERVER['REMOTE_ADDR']);});

// This route is checked but will be ignored since the authentication middle ware will always return false
$router->get(
    '/protected',
    [
        new \App\Middleware\Authentication()
    ],
    function($req, $res, $par)
    {
        return 'hi, This page is protected for non signed in users';
    }
);

// since the first check is ignored, we can make a new route with the same path but with a redirect to the login page
$router->get('/protected',[],function($req,$res,$par){return Helpers::instance('http')->redirect('/login');});

// booya you can log in now
$router->get(
    '/login',
    [],
    function($req, $res, $par){return 'You should login';}
);


// catch route
$router->get('/:page',[], 'Home:pageNotFound');
