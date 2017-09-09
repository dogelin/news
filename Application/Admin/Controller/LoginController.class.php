<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        $this->display();
    }
    public function check(){
        $login = D('admin');
        $username = trim(I('username'));
        $password = trim(I('password'));
        if(!username){
            return json_show(0, "用户名不能为空");
        }
        if(!password){
            return json_show(0, "密码不能为空");
        }
        $data=$login->where(array('username'=>$username))->find();
        if(!$data){
            return json_show(0, "用户不存在， 请重新输入");
        }
        if(md5(sha1($password)) !== $data['password']){
            return json_show(0, "密码错误");
        }
        session('username',$username);
        session('userid',$data['id']);
        return json_show(1, "登录成功");
    }
    public function logout(){
        session(null);
        $this->redirect('index');
    }
}