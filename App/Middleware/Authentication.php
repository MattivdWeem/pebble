<?php

namespace App\Middleware;

use App\System\Middleware\MiddlewareInterface;
use App\System\Middleware\Stump;

class Authentication extends Stump implements MiddlewareInterface{

    private $name = 'Authentication';

    public function getName()
    {
        return $this->name;
    }

    public function call($req, $res, $done){
        return $done(true, []);
    }

}