<?php
namespace Home\Controller;
use Think\Controller;
//空控制器
class EmptyController extends CommonController {
    public function _empty(){
        $html=<<<HTML
        <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="UTF-8">
                    <title>404</title>
                </head>
                <body>
                    <center>
                    <img src="http://127.0.0.1/news/Public/Home/image/404.jpg">
                    </center>
                </body>
            </html>
HTML;
        echo $html;
    }
}