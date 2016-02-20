<?php

namespace App\Controllers;

use App\System\Controllers\ControllerInterface;
use App\System\Controllers\Stump;

class HomeController extends Stump implements ControllerInterface{

    public function display(){
        return '<h1>Smoked Potatoes</h1>';
    }

    public function displayAnother(){


    }
}