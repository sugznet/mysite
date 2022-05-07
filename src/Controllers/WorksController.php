<?php
namespace DSugiyama\Controller; 
use DSugiyama\Util\BaseController;
use DSugiyama\Util\ViewRender;
use DSugiyama\Model\Content;
class WorksController extends BaseController 
{
    public function index() 
    {
        $content = new Content();
        $works_list = $content::works_list();
        $blog_list = $content::blog_list();
        $render = new ViewRender();
        $render::render('works/index.twig', [
            siteinfo => parent::siteinfo(),
            works_list => $works_list,
        ]);
    }

    
    public function alphamusic() 
    {
        $render = new ViewRender();
        $render::render('works/music/alphamusic.twig', [
            siteinfo => parent::siteinfo(),
        ]);
    }

    public function dsugiyama() 
    {
        $content = new Content();
        $works_detail = $content::works_detail(1, 0);
        $render = new ViewRender();
        $render::render('works/website/dsugiyama.twig', [
            siteinfo => parent::siteinfo(),
            works_detail => $works_detail[0],
        ]);
    }

    public function rabbit() 
    {
        $content = new Content();
        $works_detail = $content::works_detail(3, 0);
        $render = new ViewRender();
        $render::render('works/music/rabbit-forever.twig', [
            siteinfo => parent::siteinfo(),
            works_detail => $works_detail[0],
        ]);
    }

    public function overhaul() 
    {
        $content = new Content();
        $works_detail = $content::works_detail(4, 0);
        $render = new ViewRender();
        $render::render('works/website/overhaul.twig', [
            siteinfo => parent::siteinfo(),
            works_detail => $works_detail[0],
        ]);
    }


    public function mugito() 
    {
        $render = new ViewRender();
        $render::render('works/game/mugito.twig', [
            siteinfo => parent::siteinfo(),
        ]);
    }

}