<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function __construct() {
        parent::__construct();
        if(!session('userid')){
            $this->redirect('Login/index');
        }
    }
}