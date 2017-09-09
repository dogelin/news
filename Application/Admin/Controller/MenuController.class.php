<?php
namespace Admin\Controller;
use Think\Controller;
class MenuController extends CommonController {
    public function lst(){
        $menu = D('menu');
        $menus = $menu->order('list asc,id desc')->select();
        $this->assign('menus',$menus);
        $this->display();
    }
    public function add(){
           if($_POST) {
               if(!isset($_POST['name']) || !$_POST['name']) {
                   return json_show(0,'名称不能为空');
               }
               $menuId = D("menu")->add($_POST);
               if($menuId) {
                   return json_show(1,'新增成功',$menuId);
               }
               return json_show(0,'新增失败',$menuId);
           }else {
               $this->display();
           }
    }
    public function edit(){
        $menu = D('menu');
        $menus = $menu->find(I('id'));
        $this->assign("menus",$menus);
        if($_POST) {
            if(!isset($_POST['name']) || !$_POST['name']) {
                return json_show(0,'名称不能为空');
            }
            if(!isset($_POST['id']) || !$_POST['id']){
                return json_show(0,'数据更新失败');
            }
            $menuId = D("menu")->save($_POST);
            if($menuId) {
                return json_show(1,'更新成功',$menuId);
            }
            return json_show(0,'更新失败',$menuId);
        }
        $this->display();
    }
    public function del(){
        $menu = D('menu');
        if($menu->delete(I('id'))){
            return json_show(1,'删除成功');
        }else{
            return json_show(0,'删除失败');
        }
    }
    public function dels(){
        $menu = D('menu');
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
        $menu = D('menu');
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
        $menu = D('menu');
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
}