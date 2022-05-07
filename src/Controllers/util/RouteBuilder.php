<?php
namespace DSugiyama\Util; 
use FastRoute;
class RouteBuilder
{
    public function build()
    {
        $route = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r)
        {
            $config = parse_ini_file("/home/www/d.sugiyama/src/config/route.ini", true);
            for($i = 0; $i < count($config['uri'])+1; $i++)
            {
                $r->addRoute('GET', $config['uri'][$i], $config['class'][$i]);
                $r->addRoute('POST', $config['uri'][$i], $config['class'][$i]);
            }
        });
        return $route;
    }
}