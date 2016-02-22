<?php

namespace App\Controllers;

use App\System\Controllers\ControllerInterface;
use App\System\Controllers\Stump;
use App\System\Runtime\Helpers;

class HomeController extends Stump implements ControllerInterface{

    public function display($req, $res, $params){
        return Helpers::instance('template')->render('home',$params);
    }

    public function pageNotFound($req, $res, $params){
        return Helpers::instance('template')->render('notFound',$params);
    }
}