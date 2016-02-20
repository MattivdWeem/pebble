<?php


// include composer
require_once($settings['vendor']['directory'].$settings['vendor']['loader']);

// inject default helper functions, not classes
require_once($settings['app']['directory'].'System/Utils.php');

// boot up the runtime and the router
$app        = new \App\System\App();
$runtime    = new \App\System\Runtime\NodeList();
$router     = new \App\System\Router();

// include the routes default path
foreach (glob($settings['app']['directory'].'Routes/*Routes.php') as $route) {
    require_once($route);
}

$routerNode = new \App\System\Runtime\Node();
$routerNode->write($router->getRunTime());

$runtime->push($routerNode);

$app->load($runtime);
$app->run();
