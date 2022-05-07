<?php
namespace DSugiyama\Util; 
use DSugiyama\Util\HttpResponse;
use DSugiyama\Util\TwigViewRender;
class ViewRender 
{
    public function render($viewfilepath, $array=[], $templateengine='twig')
    {
        switch ($templateengine)
        {
            case 'twig':
                $view_render = new TwigViewRender();
                $view_render->render($viewfilepath, $array);
                break;
            default: 
                break;
        }
    }
}