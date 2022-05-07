<?php
namespace DSugiyama\Util; 
class HttpResponse
{
    public function http200($route_data)
    {
        $handler = $route_data[1];
        $vars = $route_data[2];
        list($class, $http_method) = explode("/", $handler, 2);
        call_user_func_array(array(new $class, $http_method), [$vars]);
    }
	public function http404()
    {
        echo "404 Not Found.";
    }
	public function http405($route_data)
    {
        $allowed_method = $route_data[1];
        echo "405 Method Not Allowed. allow only=" . json_encode($allowed_method);
    }
	public function http500()
    {
        echo "500 Server Error.";
    }
}