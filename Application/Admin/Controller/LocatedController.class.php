<?php
namespace Admin\Controller;
use Think\Controller;
class LocatedController extends CommonController {
    public function lst(){
        $loca = D('located');
        $locas = $loca->order('id desc')->select();
        $this->assign('locas',$locas);
        $this->display();
    }
    public function add(){
           if($_POST) {
               if(!isset($_POST['name']) || !$_POST['name']) {
                   return json_show(0,'名称不能为空');
               }
               $locaId = D("located")->add($_POST);
               if($locaId) {
                   return json_show(1,'新增成功',$locaId);
               }
               return json_show(0,'新增失败',$locaId);
           }else {
               $this->display();
           }
    }
    public function edit(){
        $loca = D('located');
        $locas = $loca->find(I('id'));
        $this->assign("locas",$locas);
        if($_POST) {
            if(!isset($_POST['name']) || !$_POST['name']) {
                return json_show(0,'名称不能为空');
            }
            if(!isset($_POST['id']) || !$_POST['id']){
                return json_show(0,'数据更新失败');
            }
            $locaId = D("located")->save($_POST);
            if($locaId) {
                return json_show(1,'更新成功',$locaId);
            }
            return json_show(0,'更新失败',$locaId);
        }
        $this->display();
    }
    public function del(){
        $loca = D('located');
        if($loca->delete(I('id'))){
            return json_show(1,'删除成功');
        }else{
            return json_show(0,'删除失败');
        }
    }
    public function dels(){
        $loca = D('located');
        $data = I("dels");
        $data = array_values($data);
        $data = implode(",", $data);
        if($loca->delete($data)!==false){
            return json_show(1,'批量删除成功');
        }else{
            return json_show(0,'批量删除失败');
        }
    }
    
    public function status(){
        $loca = D('located');
        $status = I("status");
        $id = I('id');
        if($status == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        $data['id'] = $id;
        $data['status'] = $status;
        $result = $loca->save($data);
        if($result !== false){
            return json_show(1, "状态修改成功");
        }else{
            return json_show(0, "状态修改失败");
        }
    }
}