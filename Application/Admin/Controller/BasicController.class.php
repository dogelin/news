<?php
namespace Admin\Controller;
use Think\Controller;
class BasicController extends CommonController {
    public function lst(){
        if($_POST){         
            $data = $_POST;
            $config = F('Basic_config',$data);
           
            
            if(!$config){
                return json_show(1,'配置成功');
            }else{
                return json_show(0,'配置失败');
            }
        }
        $cache = F('Basic_config');
        $this->assign('basic',$cache);
        $this->display();
    }
}