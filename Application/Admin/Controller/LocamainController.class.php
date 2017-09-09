<?php
namespace Admin\Controller;
use Think\Controller;
class LocamainController extends CommonController {
    public function lst(){    
        $push = D('LocapushView');
        $ll = D('located')->select();
        $this->assign('locas',$ll);
        if(IS_POST){
            if(I('search-sort') !== ''){
                $where['pushname']= I('search-sort');
            }
            $key = I('keywords');
            if($key!==''){
                $where['artname'] =["like","%{$key}%"];
            }
            $key = I('keywords');
            $pushs = $push->order('id desc')->where($where)->select();
        }else{          
            $pushs = $push->order('id desc')->select();
        }
        $this->assign('push',$pushs);
        
        $this->display();
    }
    public function edit(){
        $push = D('locapush');
        $pushs = $push->find(I('id'));
        $this->assign("pushs",$pushs);
        $loca = D('located');
        $locas = $loca->select();
        $this->assign("locas",$locas);
        if($_POST) {
            if(!isset($_POST['loca_id']) || !$_POST['loca_id']) {
                return json_show(0,'请选择推荐位');
            }
            if(!isset($_POST['id']) || !$_POST['id']){
                return json_show(0,'数据更新失败');
            }
            $menuId = D("locapush")->save($_POST);
            if($menuId) {
                return json_show(1,'更新成功',$menuId);
            }
            return json_show(0,'更新失败',$menuId);
        }
        $this->display();
    }
    public function del(){
        $menu = D('locapush');
        if($menu->delete(I('id'))){
            return json_show(1,'删除成功');
        }else{
            return json_show(0,'删除失败');
        }
    }
    public function dels(){
        $menu = D('locapush');
        $data = I("dels");
        $data = array_values($data);
        $data = implode(",", $data);
        if($menu->delete($data)!==false){
            return json_show(1,'批量删除成功');
        }else{
            return json_show(0,'批量删除失败');
        }
    }  
}