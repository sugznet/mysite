<?php
namespace DSugiyama\Controller; 
use DSugiyama\Util\BaseController;
use DSugiyama\Util\ViewRender;
use DSugiyama\Model\Content;
class WorklogController extends BaseController 
{
    public function list() 
    {
        $client = parent::microcms();
        $contents = $client->list("contents", [
            "orders" => ["createdAt", "-updatedAt"],
            "filters" => "menu[contains]Worklog"
        ]);
        // var_dump($result);
        $render = new ViewRender();
        $render::render('worklog/list.twig', [
            siteinfo => parent::siteinfo(),
            blog_list => $blog_list,
        ]);
    }
}