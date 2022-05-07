<?php
namespace DSugiyama\Controller; 
use DSugiyama\Util\BaseController;
use DSugiyama\Util\ViewRender;
use DSugiyama\Model\Content;
use Microcms\Client;
class BlogController extends BaseController 
{
    public function index() 
    {
        $client = parent::microcms();
        $result = $client->list("contents", [
            "orders" => ["createdAt", "-updatedAt"],
            "filters" => "menu[contains]Works"
        ]);
        // var_dump($result);
        $content = new Content();
        $blog_list = $content::blog_list();
        $render = new ViewRender();
        $render::render('blog/index.twig', [
            siteinfo => parent::siteinfo(),
            blog_list => $blog_list,
        ]);
    }
}