<?php
namespace Home\Controller;
use Think\Controller;
class MenuController extends CommonController {
    public function lst(){
       // $this->current();
        $id = I('id');
        $cont = M('content'); // 实例化User对象
        $count      = $cont->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $cont->order('id desc')->where(array('cate_id'=>$id))->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->current();
        $this->assign('conts',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }
    public function current(){
        $current = I('id');
        $this->assign('current',$current);
    }
}