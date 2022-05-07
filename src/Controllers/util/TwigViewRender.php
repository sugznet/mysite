<?php
namespace DSugiyama\Util; 
use DSugiyama\Util\HttpResponse;
class TwigViewRender
{
    public function render($viewfilepath, $array=[])
    {
        $config = parse_ini_file("/home/www/d.sugiyama/src/config/path.ini", true);
        $loader = new \Twig\Loader\FilesystemLoader($config['view_path']);
        $loader->addPath($config['view_path'], 'template_root');
        $env = new \Twig\Environment($loader, [
            'cache'=>false,
        ]);
        if(file_exists($config['view_path'].$viewfilepath))
        {
            echo $env->load($viewfilepath)->render($array);
        }
        else
        {
            $http_response = new HttpResponse();
            $http_response->http500();
        }
    }
}
