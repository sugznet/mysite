<?php
namespace DSugiyama\Test; 
use DSugiyama\Test\TestKey;
class TestController
{
    public function website_pass()
    {
        if($_POST['token'] != "zy4ipwekqfvan9idt5bqwqw4svvfvguqzqag8ues")
        {
            echo "token error";
            exit;
        }
        if($_POST['sitename'] == "")
        {
            echo "sitename error";
            exit;
        }
        if($_POST['url'] == "")
        {
            echo "url error";
            exit;
        }
        $sitename = $_POST["sitename"];
        $pageurl = $_POST["url"];
        $url = TestKey::$slack_webhook_url;
        $message = [
            "channel" => "#運用",
            "username" => "ロボット",
            "text" => "",
            "attachments" => [
                "blocks" => [
                    "color" => "#86B049",
                    "type" => "section",
                    "text" => "\n\n*接続OK*\n日時：". date("Y年m月d日 H時i分s秒") . "\nサイト：".$sitename."\nURL：".$pageurl."",
                ],
            ],
        ];
        $ch = curl_init();        
        $options = [
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_POST => true,
          CURLOPT_POSTFIELDS => http_build_query([
            'payload' => json_encode($message)
          ])
        ];
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        curl_close($ch);
    }

    public function website_fail()
    {
        if($_POST['token'] != "zy4ipwekqfvan9idt5bqwqw4svvfvguqzqag8ues")
        {
            echo "token error";
            exit;
        }
        if($_POST['sitename'] == "")
        {
            echo "sitename error";
            exit;
        }
        if($_POST['url'] == "")
        {
            echo "url error";
            exit;
        }
        $sitename = $_POST["sitename"];
        $pageurl = $_POST["url"];
        $url = TestKey::$slack_webhook_url;
        $message = [
            "channel" => "#運用",
            "username" => "ロボット",
            "text" => "<@U02V6NAQ8QJ>",
            "attachments" => [
                "blocks" => [
                    "color" => "#ff4646",
                    "type" => "section",
                    "text" => "\n\n*接続NG*\n日時：". date("Y年m月d日 H時i分s秒") . "\nサイト：".$sitename."\nURL：".$pageurl."",
                ],
            ],
        ];
        $ch = curl_init();        
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query([
            'payload' => json_encode($message)
            ])
        ];
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        curl_close($ch);
    }
}