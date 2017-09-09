<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
    public function lst(){
        $user = D('admin');
        $users = $user->order('id desc')->select();
        $this->assign('users',$users);
        $this->display();
    }
    public function add(){
           if($_POST) {
               if(!isset($_POST['username']) || !$_POST['username']) {
                   return json_show(0,'名称不能为空');
               }
               if(!isset($_POST['password']) || !$_POST['password']) {
                   return json_show(0,'密码不能为空');
               }
               $data['username'] = $_POST['username'];
               $data['password'] = md5(sha1($_POST['password']));
               $data['createtime'] = time();
               $data['visittime'] = time();
               $userId = D("admin")->add($data);
               if($userId) {
                   return json_show(1,'新增成功',$userId);
               }
               return json_show(0,'新增失败',$userId);
           }else {
               $this->display();
           }
    }
    public function edit(){
        $user = D('admin');     
        $users = $user->find(I('id'));
        $this->assign("users",$users);
        if($_POST) {
            if(!isset($_POST['id']) || !$_POST['id']){
                return json_show(0,'数据更新失败');
            }
            if(!isset($_POST['password']) || !$_POST['password']) {
                return json_show(0,'密码不能为空');
            }
            $_POST['password'] = md5(sha1($_POST['password']));
            $userId = $user->save($_POST);
            if($userId) {
                return json_show(1,'更新成功',$userId);
            }
            return json_show(0,'更新失败',$userId);
        }
        $this->display();
    }
    public function del(){
        $user = D('user');
        if($user->delete(I('id'))){
            return json_show(1,'删除成功');
        }else{
            return json_show(0,'删除失败');
        }
    }
}