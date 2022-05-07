<?php
namespace DSugiyama\Model; 
class BaseModel
{
    protected function db_connect()
    {
        $config = parse_ini_file("/home/www/d.sugiyama/src/config/db.ini", true);
        $db = new \Illuminate\Database\Capsule\Manager();
        $db->addConnection([
            "driver" => $config['driver'],
            "host" => $config['host'],
            "database" => $config['database'],
            "username" => $config['username'],
            "password" => $config['password'],
            "charset" => $config['charset'],
        ]);    
        $db->setAsGlobal();
        $db->bootEloquent();
    }
}
