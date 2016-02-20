<?php

namespace App\System\Middleware;

class Stump {

    private $req;
    private $res;

    public function call($req, $res, $done)
    {
        $this->setReq($req);
        $this->setRes($res);
        return $done(true, []);
    }

    /**
     * @return mixed
     */
    public function getReq()
    {
        return $this->req;
    }

    /**
     * @param mixed $req
     */
    public function setReq($req)
    {
        $this->req = $req;
    }

    /**
     * @return mixed
     */
    public function getRes()
    {
        return $this->res;
    }

    /**
     * @param mixed $res
     */
    public function setRes($res)
    {
        $this->res = $res;
    }



}
