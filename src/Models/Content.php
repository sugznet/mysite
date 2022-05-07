<?php
namespace DSugiyama\Model; 
use DSugiyama\Model\Table;
use Illuminate\Database\Capsule\Manager;
class Content extends BaseModel
{
    public function works_list() 
    {
        parent::db_connect();
        $sql = "select p.id,p.kind,p.title,p.slug,p.thumbnail,p.created_date,p.updated_date,t.id tag_id,t.name tag_name,t.slug tag_slug 
        from post p 
        left join tag_map tm on p.id = tm.post_id 
        left join tag t on tm.tag_id = t.id 
        where kind='works'
        order by updated_date desc";
        $table = Manager::select($sql);
        return $table;
    }

    public function works_detail($id, $slug)
    {
        parent::db_connect();
        if(empty($id)) {
            $where_id = " 1 ";
        }
        else {
            $where_id = " p.id='" . $id . "' ";
        }
        if(empty($slug)) {
            $where_slug = " 1 ";
        }
        else {
            $where_slug = " p.slug='" . $slug . "' ";
        }
        $sql = "select p.id,p.kind,p.title,p.slug,p.thumbnail,p.created_date,p.updated_date,t.id tag_id,t.name tag_name,t.slug tag_slug 
        from post p 
        left join tag_map tm on p.id = tm.post_id 
        left join tag t on tm.tag_id = t.id 
        where p.kind='works' and " . $where_id . " and " . $where_slug . " 
        order by updated_date desc";
        // echo $sql;
        $table = Manager::select($sql);
        // echo json_encode($table);
        return $table;
    }

    public function blog_list() 
    {
        parent::db_connect();
        $sql = "select p.id,p.kind,p.title,p.slug,p.thumbnail,p.created_date,p.updated_date,t.id tag_id,t.name tag_name,t.slug tag_slug 
        from post p 
        left join tag_map tm on p.id = tm.post_id 
        left join tag t on tm.tag_id = t.id 
        where kind='blog'
        order by updated_date desc";
        $table = Manager::select($sql);
        return $table;
    }
    
}