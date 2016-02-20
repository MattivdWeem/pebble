<?php

namespace App\System;

class Router{

    private $params;
    private $runTime = [];

    /**
     *
     */
    public function __construct(){
        $this->setParams($this->getRequestParams());
    }


    /**
     * @return array
     */
    private function getRequestParams(){
        return [
            'server' => $_SERVER,
            'request' => $_REQUEST
        ];
    }


    /**
     * @param $request
     * @return bool
     */
    public function checkMethod($request){
        return (strtoupper($request) === strtoupper($this->getParams()['server']['REQUEST_METHOD']));
    }

    /**
     * @param $type
     * @param $request
     * @param $middleware
     * @param $callback
     * @return bool
     * @throws \Exception
     */
    private function route($type, $request, $middleware, $callback){

        if (!$this->checkMethod($type)){
            return false;
        }


        if (!is_array($middlewareResult = $this->handleMiddleware($middleware))){
            return false;
        }


        if (!$params = $this->matchRoute($request)){
            return false;
        }
        if (!is_array($params)){
            $params = [];
        }


        $runtime = $this->getRunTime();
        $runtime[] = [$this,'handleCallback',[$callback,$middlewareResult,$params]];
        $this->setRunTime($runtime);
        return true;

    }

    /**
     * @param $callback
     * @param $middlewareResult
     * @param $params
     * @return mixed
     */
    public function handleCallback($callback, $middlewareResult, $params){

        if (is_string($callback)){
            return $this->handleControllerCall($callback, $middlewareResult, $params);
        }
        return $callback($middlewareResult[0],$middlewareResult[1],array_merge([$middlewareResult[2]],$params));

    }

    /**
     * @param $callback
     * @param $middlewareResult
     * @param $params
     * @return mixed
     */
    private function handleControllerCall($callback, $middlewareResult, $params){

        $call = explode(':',str_replace('Controller','',$callback));

        if(!is_array($call)){
            $call = [$call,$call];
        }


        $class = '\App\Controllers\\'.$call[0].'Controller';
        $cl = new $class();
        return $cl->$call[1]($middlewareResult[0],$middlewareResult[1],array_merge([$middlewareResult[2]],$params));

    }

    /**
     * @param $request
     * @return array|bool
     */
    private function matchRoute($request){

        $params = [];

        $uri = explode('/',rtrim($this->getParams()['server']['REQUEST_URI'], '/'));
        $match = explode('/',$request);

        if (count($uri) !== count($match)) {
            return false;
        }


        foreach($match as $key => $m){
            if (strpos($m,':') !== false){
                $params[str_replace(':','',$m)] = $uri[$key];
                continue;
            }
            if ($m == $uri[$key] || $m == '*'){

                continue;
            }
            return false;
        }

        if (!$params){$params = true;}
        return $params;


    }

    /**
     * @param $middleware
     * @return array|bool
     * @throws \Exception
     */
    private function handleMiddleware($middleware){
        $req = [];
        $res = [];
        $par = [];

        if (!empty($middleware)){
            foreach($middleware as $mw){
                if (!$mw instanceof \App\System\Middleware\Stump){
                    throw new \Exception('Middle ware is not an instance of middlewarestump');
                    return false;
                }

                $par[$mw->getName()] = $mw->call($req, $res,function($status, $result){
                    return [$status, $result];
                });

                if ($par[$mw->getName()][0]){
                    $req = $mw->getReq();
                    $res = $mw->getRes();
                } else {
                    return false;
                }
            }
        }
        return [$req,$res,$par];
    }


    /**
     * @param $request
     * @param array $middleware
     * @param $callback
     * @return bool
     */
    public function get($request, array $middleware, $callback ){
        return $this->route('GET',$request, $middleware, $callback);
    }

    /**
     * @param $request
     * @param array $middleware
     * @param $callback
     * @return bool
     */
    public function post($request, array $middleware, $callback ){
        return $this->route('POST',$request, $middleware, $callback);
    }

    /**
     * @param $request
     * @param array $middleware
     * @param $callback
     * @return bool
     */
    public function put($request, array $middleware, $callback ){
        return $this->route('PUT',$request, $middleware, $callback);
    }

    /**
     * @param $request
     * @param array $middleware
     * @param $callback
     * @return bool
     */
    public function update($request, array $middleware, $callback ){
        return $this->route('UPDATE',$request, $middleware, $callback);
    }

    /**
     * @param $request
     * @param array $middleware
     * @param $callback
     * @return bool
     */
    public function delete($request, array $middleware, $callback ){
        return $this->route('DELETE',$request, $middleware, $callback);
    }


    /**
     * @param $method
     * @param $request
     * @param array $middleware
     * @param $callback
     * @return bool
     */
    public function match($method, $request, array $middleware, $callback ){
        return $this->route($method ,$request, $middleware, $callback);
    }


    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    public function getRunTime()
    {
        return $this->runTime;
    }

    /**
     * @param mixed $runTime
     */
    public function setRunTime($runTime)
    {
        $this->runTime = $runTime;
    }


}
