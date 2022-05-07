<?php
namespace DSugiyama\Controller; 
use DSugiyama\Util\BaseController;
use DSugiyama\Util\ViewRender;
class AboutController extends BaseController 
{
    public function index() 
    {
        $render = new ViewRender();
        $render::render('about/index.twig', [
            siteinfo => parent::siteinfo(),
        ]);
    }
}