<?php

namespace App\System;

use App\System\Runtime\NodeList;

class App {

    private $runtime;
    private $depList = [];

    public function run($config = [])
    {

        foreach((array) $this->getRuntime()->getNodeList()[0] as $node){
            foreach($node as $content){
                $method = (String) $content[1];
                $this->render(
                    $content[0]->$method($content[2][0],$content[2][1],$content[2][2])
                );
            }
        }


    }

    /**
     * @return mixed
     */
    public function getRuntime()
    {
        return $this->runtime;
    }

    /**
     * @param mixed $runtime
     */
    public function load(
        NodeList $runtime
    )
    {
        $this->runtime = $runtime;
    }

    public function render($content){
        if (is_array($content)) {print_r($content); return;}
        if (is_string($content)) {echo urldecode($content); return;}
    }


    public function add($name, $recourse){
        $this->depList[$name] = $recourse;
    }


}