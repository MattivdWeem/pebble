<?php

namespace App\System\Runtime;

class NodeList{

    private $nodeList = [];

    public function push(
        \App\System\Runtime\Node $node
    ){
        $list = $this->getNodeList();
        $list[] = $node;
        $this->setNodeList($list);
    }

    /**
     * @return array
     */
    public function getNodeList()
    {
        return $this->nodeList;
    }

    /**
     * @param array $nodeList
     */
    public function setNodeList($nodeList)
    {
        $this->nodeList = $nodeList;
    }

}