<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/uploadify/uploadify.css">
        <script type="text/javascript" src="/Public/Admin/js/libs/modernizr.min.js"></script>
</head>

<body>
	<script type="text/javascript" src="/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/Public/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" src="/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <ul class="navbar-list clearfix">
                <li><a class="on" href="/index.php/Admin/Index/index">首页</a></li>
                <li><a href="/index.php/Home/Index/index" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#"><?php echo $_SESSION['username']; ?></a></li>
                <li><a href="/index.php/Admin/Login/logout" >退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="/index.php/Admin/Menu/lst"><i class="icon-font">&#xe006;</i>栏目管理</a></li>
                        <li><a href="/index.php/Admin/Content/lst"><i class="icon-font">&#xe005;</i>新闻管理</a></li>
                        <li><a href="/index.php/Admin/Located/lst"><i class="icon-font">&#xe008;</i>推荐位管理</a></li>
                        <li><a href="/index.php/Admin/Locamain/lst"><i class="icon-font">&#xe052;</i>推荐内容管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="/index.php/Admin/Basic/lst"><i class="icon-font">&#xe017;</i>基本设置</a></li>
						<li><a href="/index.php/Admin/User/lst"><i class="icon-font">&#xe006;</i>管理员管理</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i>
            <a href="/index.php/Admin/Index/index">首页</a>
            <span class="crumb-step">&gt;</span>
            <a class="crumb-name" href="/index.php/Admin/Content/lst">新闻管理</a>
            <span class="crumb-step">&gt;</span><span>编辑新闻</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="editForm" name="editForm" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>新闻名称：</th>
                                <td>
                                	<input type="hidden" name="id" value="<?php echo ($conts["id"]); ?>">
                                    <input class="common-text required" id="name" name="artname" size="50" value="<?php echo ($conts["artname"]); ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>新闻描述：</th>
                                <td>
                                    <textarea name="desc" id="desc" cols="50" rows="5"><?php echo ($conts["desc"]); ?></textarea>
                                </td>
                            </tr>
                            <tr>
                            	<th><i class="require-red">*</i>所属栏目：</th>
                                	<td>
                                   	 <select name="cate_id" >
                                   	 <?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($vo['id'] == $conts['cate_id']): ?>selected="selected"<?php endif; ?> ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                   	 </select>
                                	</td>
                            </tr>
                            <tr>
                            	<th>缩略图：</th>
                                	<td>
                                   	  <input id="file_upload" name="file_upload" type="file" multiple="true">
										<img style="display:none" id="upload_img" src="" width="150" height="150">
										<input id="file_upload_image" name="pic" type="hidden" multiple="true" value="">
                                	</td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>新闻内容：</th>
                                <td>
                                	<textarea  name="content" id="content"><?php echo ($conts["content"]); ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <button type="button" class="btn btn-primary btn6 mr10" id="submit_edit">提交</button>
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
    <script src="/Public/Admin/js/jquery.js" type="text/javascript"></script>
    <script src="/Public/Admin/js/dialog/layer.js"></script>
    <script src="/Public/Admin/js/dialog.js"></script> 
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
    <script src="/Public/Admin/uploadify/jquery.uploadify.js" type="text/javascript"></script>
<script src="/Public/Admin/js/image.js"></script>
<script type="text/javascript">
UE.getEditor('content',{initialFrameWidth:900,initialFrameHeight:400,});
	var SCOPE={
			'save_url': '/index.php/Admin/Content/edit/id/53',
			'jump_url' :'/index.php/Admin/Content/lst',
			'ajax_upload_image_url' : '/index.php/Admin/Image/uploadify',
		    'ajax_upload_swf' : '/Public/Admin/uploadify/uploadify.swf',
	};
</script>
</body>
</html>