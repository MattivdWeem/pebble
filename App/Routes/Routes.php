<?php
//$router->get('/hello',[], 'Home:display');
$router->get('/hello',[], 'Home:displayAnother');


$router->get(
    '/hello/:name',
    [
        new \App\Middleware\Authentication()
    ],
    function($req, $res, $par)
    {
        return 'hi, '.$par['name'].'<br />Welcome to Racoon';
    }
);




