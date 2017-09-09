<?php
namespace Home\Controller;
use Think\Controller;
class ContentController extends CommonController {
    public function lst(){
        $cont = D('content');
        $where['id'] = I('id');
        $conts = $cont->where($where)->find();
        $this->getCount($conts['count']++);
        $this->assign('conts',$conts);
        $this->display();
    }
    public function getCount($count){
        $cont = D('content');
        $data['id'] = I('id');
        $data['count'] = $count + 1;
        $result = $cont->save($data);
    }
}