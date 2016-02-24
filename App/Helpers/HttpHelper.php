<?php

namespace App\Helpers;


class HttpHelper{


    /*
     * Will kill of the node list and redirect the user to the new page, this will stop every
     * node process thats running
     *
     * @param $url
     */

    public static function redirect($url){
        header('location: '.$url);
        plannedExit('Redirect to: '.$url);
    }

}