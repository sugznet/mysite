<?php
namespace DSugiyama\Util; 
class Config
{
    private $config_dir = "/home/www/d.sugiyama/src/config";

    public function __construct($_config_dir = "")
    {
        if(strlen($_config_dir) > 0)
        {
            if(file_exists($_config_dir))
            {
                $this->config_dir = $_config_dir;
            }
        }
    }

    public function load($filename)
    {
        return parse_ini_file($this->$config_dir . '/' . $filename . '.ini' , true);
    }

    public function exists($filename)
    {
        if(file_exists($this->$config_dir . '/' . $filename . '.ini'))
        {
            return true;
        }       
        else
        {
            return false;
        }
    }
}
