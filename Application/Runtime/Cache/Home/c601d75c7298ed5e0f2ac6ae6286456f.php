<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="UTF-8">
  <title><?php echo ($cache["title"]); ?></title>
  <meta name="keywords" content="<?php echo ($cache["key"]); ?>">
  <meta name="description" content="<?php echo ($cache["disc"]); ?>">
  <link rel="stylesheet" href="/Public/Home/css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="/Public/Home/css/main.css" type="text/css">
  <style>
		.news-list dl dd{
    		text-align:center;
    		text-overflow: ellipsis;
			white-space: nowrap;
			overflow: hidden; 
    	}
</style>
</head>
<body>
<header id="header">
  <div class="navbar-inverse">
    <div class="container">
      <div class="navbar-header">
          <img src="/Public/Home/image/logo.png" alt="">
      </div>
      <ul class="nav navbar-nav navbar-left">
        <li><a href="/index.php/Home/Index/index" class="curr">首页</a></li>
        <?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/index.php/Home/Menu/lst/id/<?php echo ($vo["id"]); ?>" <?php if($vo['id'] == $current): ?>class="curr"<?php endif; ?>> <?php echo ($vo["name"]); ?></a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
  </div>
</header>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-9">
				<div class="news-detail" style="padding:40px 50px 0px 10px;">
					<h1><?php echo ($conts["artname"]); ?></h1>
					<p><br></p>
					<p>
						<span><?php echo (strtime($conts["updatetime"])); ?></span>&nbsp;&nbsp;&nbsp;
						<span>阅读数：<?php echo ($conts["count"]); ?></span>&nbsp;&nbsp;&nbsp;
						<span>所属栏目：<?php echo (catename($conts["cate_id"])); ?></span>
					</p>
					<p style="font-size: 18px;color: #5a5353;"><i><?php echo ($conts["desc"]); ?></i></p>
					<p><img src="<?php echo ($conts["pic"]); ?>" alt=""  width="474" height="301" align=""> </p>
					<p style="font-size: 22px;">
						<?php echo htmlspecialchars_decode($conts['content']); ?>
					</p>
				</div>
			</div>
			<div class="col-sm-3 col-md-3">
	<div style="height:360px;">
		<div class="right-title">
	  		<h3>文章推荐</h3>
	    	<span>TOP ARTICLES</span>
	  	</div>
	  	<div class="right-content">
	    	<ul>
	    		<?php if(is_array($tui)): $i = 0; $__LIST__ = $tui;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="num1 curr">
	        			<a target="_blank" href="/index.php/Home/Content/lst/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["artname"]); ?></a>
	      			</li><?php endforeach; endif; else: echo "" ;endif; ?>
	   		</ul>
	  	</div>
	</div>
  	<div class="right-title">
    	<h3>文章排行</h3>
    	<span>TOP ARTICLES</span>
  	</div>
  	<?php if(is_array($top)): $i = 0; $__LIST__ = $top;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="right-hot">
    		<a target="_blank" href="/index.php/Home/Content/lst/id/<?php echo ($vo["id"]); ?>">
    			<img src="<?php echo ($vo["pic"]); ?>" alt="<?php echo ($vo["artname"]); ?>" width="262px" height="149px">
    		</a>
  		</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
		</div>
	</div>
</section>
<script src="/Public/Home/js/jquery.js"></script>
<script src="/Public/Home/js/imageunt.js"></script>
</body>
</html>