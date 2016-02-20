<?php

namespace App\System\Runtime;

class Node {

    private $object;

    public function write($obj){
        $this->setObject($obj);
    }

    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->getObject();
    }

    /**
     * @param mixed $object
     */
    public function setObject($object)
    {
        $this->object = $object;
    }

}
