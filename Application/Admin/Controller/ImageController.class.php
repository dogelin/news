<?php
namespace Admin\Controller;
use Think\Controller;
class ImageController extends CommonController {
    private $_uploadObj;
    public function __construct(){
        
    }
    public function uploadify(){
        $upload = D("UploadImage");
        $res = $upload->imageUpload();
        if($res) {
            return json_show(1,'上传成功',$res);
            
        }else{
            return json_show(0,'上传失败','');
        }
    }
}