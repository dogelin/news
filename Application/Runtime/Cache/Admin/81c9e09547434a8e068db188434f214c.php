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
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">管理员管理</span></div>
        </div>

        <div class="result-wrap">
            <form name="formlist" id="formlist" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/index.php/Admin/User/add" id="addsubmit"><i class="icon-font"></i>新增管理员</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="90%" id="messagelst">
                        <tr>
                            <th width="7%">ID</th>
                            <th>管理员名称</th>
                            <th>创建时间</th>
                            <th>最近访问</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($users)): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td ><?php echo ($vo["id"]); if($vo['id'] == 1): ?><i class="require-red">*</i><?php endif; ?></td>
                            <td ><?php echo ($vo["username"]); if($vo['id'] == 1): ?><i class="require-red">(超级管理员)</i><?php endif; ?></td>  
                            <td ><?php echo (strtime($vo["createtime"])); ?></td>  
                            <td ><?php echo (strtime($vo["visittime"])); ?></td>                         
                            <td><?php if(($_SESSION['userid'] == 1) OR ($vo['id'] == $_SESSION['userid'])): ?><a class="link-update" href="/index.php/Admin/User/edit/id/<?php echo ($vo["id"]); ?>" >修改</a>&nbsp;&nbsp;
                                <a class="link-del" href="#" onclick="del(<?php if($vo['id'] == 1): ?>-1<?php else: echo ($vo["id"]); endif; ?>)">删除</a><?php endif; ?>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
    <script src="/Public/Admin/js/jquery.js" type="text/javascript"></script>
    <script src="/Public/Admin/js/dialog/layer.js"></script>
    <script src="/Public/Admin/js/dialog.js"></script> 
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
    <script src="/Public/Admin/uploadify/jquery.uploadify.js" type="text/javascript"></script>
<script type="text/javascript">
 var SCOPE={
		 post_url:"/index.php/Admin/User/del",
		 post_dels:"/index.php/Admin/User/dels",
		 post_order:"/index.php/Admin/User/listorder",
		 jump_url:"/index.php/Admin/User/lst",
		 status_url:"/index.php/Admin/User/status",
 };
</script>
</body>
</html>