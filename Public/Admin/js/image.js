/**图像上传处理
 * 
 */
 $(function() {
    $('#file_upload').uploadify({
        'swf'      : SCOPE.ajax_upload_swf,
        'uploader' : SCOPE.ajax_upload_image_url,
        'buttonText': '上传图片',
        'fileTypeDesc': 'Image Files',
        'fileObjName' : 'file',
        //允许上传的文件后缀
        'fileTypeExts': '*.gif; *.jpg; *.jpeg; *.png',
        'onUploadSuccess' : function(file,data,response) {
            if(response) {
                var obj = JSON.parse(data); //由JSON字符串转换为JSON对象
                $('#' + file.id).find('.data').html(' 上传完毕');
                $("#upload_img").attr("src",obj.data);
                $("#file_upload_image").attr('value',obj.data);
                $("#upload_img").show();
            }else{
                alert('上传失败');
            }
        },
    });
});