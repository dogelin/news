<?php
namespace Admin\Controller;
use Think\Controller;
class ContentController extends CommonController {
    public function index(){
        $this->display('lst');
    }
    public function lst(){ 
         $con = M('content'); // 实例化对象
        $count= $con->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $con->order('list asc,id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('cons',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $locas = D('located')->where(['status'=>'1'])->select();
        $this->assign('locas',$locas);
        $this->display(); // 输出模板
    }
public function add(){
            $cate = D('menu');
            $cates = $cate->where(['status'=>'1'])->select();
            $this->assign('cates',$cates);
           if($_POST) {
               if(!isset($_POST['artname']) || !$_POST['artname']) {
                   return json_show(0,'名称不能为空');
               }
               if(!isset($_POST['desc']) || !$_POST['desc']) {
                   return json_show(0,'描述不能为空');
               }
               if(!isset($_POST['cate_id']) || !$_POST['cate_id']) {
                   return json_show(0,'所属栏目不能为空');
               }
               if(!isset($_POST['content']) || !$_POST['content']) {
                   return json_show(0,'新闻内容不能为空');
               }
               $data['artname'] = I('artname');
               $data['desc'] = I('desc');
               $data['cate_id'] = I('cate_id');
               $data['content'] = I('content');
               $data['status'] = I('status');
               $data['creattime'] = time();
               $data['updatetime'] = time();
               $data['pic'] = I('pic');
               $menuId = D("content")->add($data);
               if($menuId) {
                   return json_show(1,'新增成功',$menuId);
               }
               return json_show(0,'新增失败',$menuId);
           }else {
               $this->display();
           }
    }
    public function edit(){
        $cate = D('menu');
        $cont = D('content');
        $conts = $cont->find(I('id'));
        $this->assign("conts",$conts);
        $cates = $cate->where(['status'=>'1'])->select();
        $this->assign('cates',$cates);
    if($_POST) {
               if(!isset($_POST['artname']) || !$_POST['artname']) {
                   return json_show(0,'名称不能为空');
               }
               if(!isset($_POST['desc']) || !$_POST['desc']) {
                   return json_show(0,'描述不能为空');
               }
               if(!isset($_POST['cate_id']) || !$_POST['cate_id']) {
                   return json_show(0,'所属栏目不能为空');
               }
               if(!isset($_POST['content']) || !$_POST['content']) {
                   return json_show(0,'新闻内容不能为空');
               }
               $data['id'] = I('id');
               $data['artname'] = I('artname');
               $data['desc'] = I('desc');
               $data['cate_id'] = I('cate_id');
               $data['content'] = I('content');
               if(I('pic')){
                   $data['pic'] = I('pic');
               }
               $data['updatetime'] = time();
               $menuId = $cont->save($data);
               if($menuId !== false) {
                   return json_show(1,'更新成功',$menuId);
               }
               return json_show(0,'更新失败',$menuId);
           }else {
               $this->display();
           }
    }
    public function del(){
        $menu = D('content');
        $loca = D('locapush');
        if($menu->delete(I('id'))){
            $loca->where(['con_id'=>I('id')])->delete();
            return json_show(1,'删除成功');
        }else{
            return json_show(0,'删除失败');
        }
    }
    public function dels(){
        $menu = D('content');
        $data = I("dels");
        $data = array_values($data);
        $data = implode(",", $data);
        if($menu->delete($data)!==false){
            return json_show(1,'批量删除成功');
        }else{
            return json_show(0,'批量删除失败');
        }
    }
    public function listorder(){
        static $count=0;
        $menu = D('content');
        $data = I('ord');
        foreach ($data as $id => $list){      
            global $count;
            if($menu->where('id='.$id)->setField('list',$list)){
                $count++;
            }
        }
        if($count !== 0){
            return json_show(1,'排序成功');
        }else{
            return json_show(0,'排序失败');
        }
    }
    
    public function status(){
        $menu = D('content');
        $status = I("status");
        $id = I('id');
        if($status == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        $data['id'] = $id;
        $data['status'] = $status;
        $result = $menu->save($data);
        if($result !== false){
            return json_show(1, "状态修改成功");
        }else{
            return json_show(0, "状态修改失败");
        }
    }
    public function push(){
        $push = D('locapush');
        if(!$_POST['con_id']||!is_array($_POST['con_id'])){
            return json_show(0, "推送失败，请选择文章推送");
        }
        if(!isset($_POST['loca_id'])||!$_POST['loca_id']){
            return json_show(0, "推送失败，请选择推送栏目");
        }
        $data['loca_id'] = $_POST['loca_id'];
       foreach ($_POST['con_id'] as $v){
           $data['time'] = NOW_TIME;
           $data['con_id'] = $v;
           $check = $push->where(array('loca_id'=>$data['loca_id'],'con_id'=>$data['con_id']))->find();
            if(!$check){
                $result = $push->add($data);
            }    
       }
       if($result){
           return json_show(1, "推送成功");
       }else{
           return json_show(0, "推送失败,该文章可能已被推送");
       }            
    }
  }
