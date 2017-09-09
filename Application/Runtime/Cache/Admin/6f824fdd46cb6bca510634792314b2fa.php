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
            <span class="crumb-name">推荐位内容管理</span></div>
        </div>
		<div class="search-wrap">
            <div class="search-content">
                <form action="" method="post" name='searchname' id="searchname">
                    <table class="search-tab">
                        <tr>
                            <th width="120">推荐位:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <?php if(is_array($locas)): $i = 0; $__LIST__ = $locas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["name"]); ?>" ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                            <th width="70">新闻标题:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="formlist" id="formlist" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a id="batchDel" href="#" onclick="dels()"><i class="icon-font"></i>批量删除</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="95%" id="messagelst">
                        <tr>
                            <th class="tc" width="5%">
                            	<input class="allChoose" name="checkall" id="checkall" type="checkbox" ></th>
                            <th width="7%">ID</th>
                            <th>新闻名称</th>
                            <th>推送位</th>
                            <th>推送时间</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($push)): $i = 0; $__LIST__ = $push;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['artname'] != '' ): ?><tr>
                        	
                            <td class="tc"><input name="dels[<?php echo ($vo["id"]); ?>]"  class="dels" value ="<?php echo ($vo["id"]); ?>" type="checkbox"></td>
                            <td ><?php echo ($vo["id"]); ?></td>
                            <td ><a target="_blank" href="#" ><?php echo ($vo["artname"]); ?></a> 
                            </td>
                            <td ><a target="_blank" href="#" ><?php echo ($vo["pushname"]); ?></a> 
                            </td>
                            <td ><a target="_blank" href="#" ><?php echo (strtime($vo["time"])); ?></a> 
                            </td>
                            <td> 
                                <a class="link-update" href="/index.php/Admin/Locamain/edit/id/<?php echo ($vo["id"]); ?>">修改</a>
                                <a class="link-del" href="#" onclick="del(<?php echo ($vo["id"]); ?>)">删除</a>
                            </td>
                        </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
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
		 post_url:"/index.php/Admin/Locamain/del",
		 post_dels:"/index.php/Admin/Locamain/dels",
		 jump_url:"/index.php/Admin/Locamain/lst",
		 status_url:"/index.php/Admin/Locamain/status",
 };
</script>
</body>
</html>