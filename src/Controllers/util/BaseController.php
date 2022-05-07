<?php
namespace DSugiyama\Util; 
use Microcms\Client;
use DSugiyama\Util\Config;
class BaseController
{
    protected function siteinfo()
    {
        $config = parse_ini_file("/home/www/d.sugiyama/src/config/general.ini", true);
        $uri = $_SERVER['REQUEST_URI'];
        $pos = strpos($uri, '?');
        if ($pos !== false) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);
        $config['slug'] = $uri;
        return $config;
    }

    protected function microcms()
    {
        // $config_obj = new Config();
        // $config = $config_obj::load('api');
        $config = parse_ini_file("/home/www/d.sugiyama/src/config/api.ini", true);
        // echo $config['microcms']['api_key'];
        $client = new Client(
            $config['microcms']['domain'],
            $config['microcms']['api_key']
        );
        return $client;
    }
}
