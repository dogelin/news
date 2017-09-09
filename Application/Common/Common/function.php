<?php
//放回json值
function json_show($status,$message,$data=array()){
    $res=[
        'status'=>$status,
        'message'=>$message,
        'data'=>$data
    ];
     exit(json_encode($res));
}
//状态名称显示
function statusname($status){
    if($status == 1){
        return "正常";
    }
    if($status == 0){
        return "<font color='red'>关闭</font>";
    }
}
//栏目名称显示
function catename($cateid){
    $cate = D('menu');
    $catename = $cate->where('id='.$cateid)->select();
    return $catename[0]['name'];
}
//判断有无缩略图
function pic($pic){
    if($pic !== null){
        return "有";
    }else{
        return "无";
    }
}
//时间戳转换固定格式
function strtime($time){
    echo date("Y-m-d H:i:s",$time);
}