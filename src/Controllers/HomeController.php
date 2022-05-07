<?php
namespace DSugiyama\Controller; 
use DSugiyama\Util\BaseController;
use DSugiyama\Util\ViewRender;
use DSugiyama\Model\Content;
class HomeController extends BaseController 
{
    public function index() 
    {
        $content = new Content();
        $works_list = $content::works_list();
        $blog_list = $content::blog_list();
        $render = new ViewRender();
        $render::render('home/index.twig', [
            siteinfo => parent::siteinfo(),
            works_list => $works_list,
            blog_list => $blog_list,
        ]);
    }

    public function homev2() 
    {
        $render = new ViewRender();
        $render::render('homev2/index.twig', []);
    }
}