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
            <div class="crumb-list"><i class="icon-font"></i>
            <a href="/index.php/Admin/Index/index">首页</a>
            <span class="crumb-step">&gt;</span>
            <span class="crumb-name">栏目管理</span></div>
        </div>

        <div class="result-wrap">
            <form name="formlist" id="formlist" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/index.php/Admin/Menu/add" id="addsubmit"><i class="icon-font"></i>新增栏目</a>
                        <a id="batchDel" href="#" onclick="dels()"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="#" onclick="listorder()"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="95%" id="messagelst">
                        <tr>
                            <th class="tc" width="5%">
                            	<input class="allChoose" name="checkall" id="checkall" type="checkbox" ></th>
                            <th width="7%">排序</th>
                            <th width="7%">ID</th>
                            <th>栏目名称</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        	
                            <td class="tc"><input name="dels[<?php echo ($vo["id"]); ?>]"  class="dels" value ="<?php echo ($vo["id"]); ?>" type="checkbox"></td>
                            <td> 
                            	<input type="hidden" value="<?php echo ($vo["id"]); ?>" name="ids[<?php echo ($vo["id"]); ?>]">                 
                                <input class="common-input sort-input" name="ord[<?php echo ($vo["id"]); ?>]" value="<?php echo ($vo["list"]); ?>"  type="text">
                            </td>
                            <td ><?php echo ($vo["id"]); ?></td>
                            <td ><a target="_blank" href="#" ><?php echo ($vo["name"]); ?></a> 
                            </td>
                            <td class="status" onclick="editstatus(<?php echo ($vo["status"]); ?>,<?php echo ($vo["id"]); ?>)"><?php echo (statusname($vo["status"])); ?></td>
                            <td>
                                <a class="link-update" href="/index.php/Admin/Menu/edit/id/<?php echo ($vo["id"]); ?>">修改</a>
                                <a class="link-del" href="#" onclick="del(<?php echo ($vo["id"]); ?>)">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <!-- 
                     <div class="list-page"> 2 条 1/1 页</div>
                     -->
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
		 post_url:"/index.php/Admin/Menu/del",
		 post_dels:"/index.php/Admin/Menu/dels",
		 post_order:"/index.php/Admin/Menu/listorder",
		 jump_url:"/index.php/Admin/Menu/lst",
		 status_url:"/index.php/Admin/Menu/status",
 };
</script>
</body>
</html>