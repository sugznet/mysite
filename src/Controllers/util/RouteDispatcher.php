<?php
namespace DSugiyama\Util; 
use FastRoute;
use DSugiyama\Util\HttpResponse;
class RouteDispatcher
{
    public function dispatch($route_data)
    {
        $http_response = new HttpResponse();
        switch ($route_data[0])
        {
            case FastRoute\Dispatcher::FOUND:
                $http_response->http200($route_data);
                break;        
            case FastRoute\Dispatcher::NOT_FOUND:
                $http_response->http404();
                break;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $http_response->http405($route_data);
                break;
            default:
                $http_response->http500();
                break;
        }
    }
}