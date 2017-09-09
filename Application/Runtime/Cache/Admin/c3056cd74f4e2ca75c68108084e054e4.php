<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="/Public/Admin/uploadify/uploadify.css" rel="stylesheet" type="text/css" />
<script  charset="utf-8"    type="text/javascript" src="/Public/Admin/uploadify/jquery.min.js"></script>
<style type="text/css">
#image{
    height:300px;
    width:720px;
    border:1px #969594 solid;
}
</style>
<title>图片上传</title>
</head>
<body>
<form id="form1"  enctype="multipart/form-data"    >
    <div id="fileQueue" style='height:200px;display:none'></div>
    <input type="file" name="uploadify" id="uploadify"  multiple="true" />
    </div>
</form>
<div id="image" ></div>
<script type="text/javascript">
$(document).ready(function () {
    $("#uploadify").uploadify({
        'uploader':'/Public/Admin/uploadify/uploadify.swf',    //swf路径
        'script': '/index.php/Admin/Image/uploadify',                                      //后台处理文件上传的路径
        'cancelImg':'/Public/Admin/uploadify/uploadify-cancel.png',      //按钮背景图片的路径
        'folder': '/Public/Uploads',
        'method':'post',                       
        'buttonText':'file',
        'fileExt': '*.jpg;*.gif,*.png',                           //允许上传的文件格式为*.jpg,*.gif,*.png
        'fileDesc': 'Web Image Files(.JPG,.GIF,.PNG)',            //过滤掉除了*.jpg,*.gif,*.png的文件
        'queueID': 'fileQueue',
        'sizeLimit': '2048000',                                   //最大允许的文件大小为2M
        'fileDataName':'uploadify',
        'auto': false,
        'queueSizeLimit':15,
        'simUploadLimit':15,
        'removeCompleted':false,                                 
        'multi':true,                               
        'onCancel': funCancel,                          //当用户取消上传时
        'onComplete': funComplete,                      //完成上传任务
        'OnError': funError                             //上传发生错误时
    });
});
//用户取消函数
function funCancel(event, ID, fileObj, data) {
    alert('您取消了操作');
    return;
}
//图片上传发生的事件
function funComplete(event, ID, fileObj, response, data) {
    //alert('上传事件');
    if (response == 0) {
        alert('图片' + fileObj.name + '操作失败');
        return false;
    }else{
         var str=$('#image').html();
            var add="<img src='"+"/Uploads/"+response+"'" +"style='margin-left:15px;margin-top:15px'/></img>";
            str+=add;
         $('#image').html(str);
         return true;
    }
}
//上传发生错误时。
function funError(event, ID, fileObj, errorObj) {
    //alert('错误事件');
    alert(errorObj.info);
    return;
}
</script>
 <a href="javascript:$('#uploadify').uploadifyUpload()">上传</a>| 
</body>
</html>