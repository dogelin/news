<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function __construct(){
        parent::__construct();
        $cache = F('Basic_config');
        $this->assign('cache',$cache);
        $this->nav();
        $this->right();
    }
    //空操作
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
    public function nav(){
        $menu = D('menu');
        $menus = $menu ->order('id asc')->where(['status'=>'1'])->select();
        $this->assign('menus',$menus);
    }
    public function right(){

        $cont = D('ContentView');
        $tui = $cont->where(['pushname'=>'文章推荐','status'=>'1'])->order('id desc')->limit(5)->select();
        $this->assign('tui',$tui);
        $top = $cont->where(['pushname'=>'文章排行','status'=>'1'])->order('id desc')->limit(3)->select();
        $this->assign('top',$top);
    }
}