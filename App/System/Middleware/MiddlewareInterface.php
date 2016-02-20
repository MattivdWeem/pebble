<?php
namespace App\System\Middleware;

interface MiddlewareInterface {
    public function getName();
    public function call($req, $res, $done);
    public function getReq();
    public function getRes();
}