<?php
$router->get('/intro/:name',[], 'Home:display');
//$router->get('/hello',[], 'Home:displayAnother');


$router->get(
    '/../:name',
    [
        new \App\Middleware\Authentication()
    ],
    function($req, $res, $par)
    {
        return 'hi, '.$par['name'].'<br />Welcome to Racoon';
    }
);

$router->get('/:page',[], 'Home:pageNotFound');




