<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){  
        $this->top();
        $cont = M('content'); // 实例化User对象
        $count      = $cont->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,4);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $cont->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->where(['status'=>'1'])->select();
        $this->assign('conts',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }
    public function top(){
        $cont = D('ContentView');
        $big = $cont->where(['pushname'=>'首页大图','status'=>'1'])->limit(1)->select();
        $this->assign('big',$big);
        $small = $cont->where(['pushname'=>'右侧小图','status'=>'1'])->limit(3)->select();
        $this->assign('small',$small);
    }
    public function news(){
        $cont = D('content');
        $conts = $cont->order('id desc')->where(['status'=>'1'])->select();
        $this->assign("conts",$conts);
    }
}
