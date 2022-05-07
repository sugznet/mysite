<?php
require __DIR__ . "/../src/library/php/autoload.php"; 
$uri = $_SERVER['REQUEST_URI'];
$pos = strpos($uri, '?');
if ($pos !== false) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);
$builder = new DSugiyama\Util\RouteBuilder();
$dispatcher = new DSugiyama\Util\RouteDispatcher();
$route = $builder::build()->dispatch($_SERVER["REQUEST_METHOD"], $uri);
$dispatcher::dispatch($route);