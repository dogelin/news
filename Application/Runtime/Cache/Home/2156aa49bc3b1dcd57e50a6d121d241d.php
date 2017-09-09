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
					<?php if(is_array($conts)): $i = 0; $__LIST__ = $conts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="news-list">
						<dl>
							<dt><a href = "/index.php/Home/Content/lst/id/<?php echo ($v["id"]); ?>"><?php echo ($v["artname"]); ?></a></dt>
							<dd class="news-img">
								<a href="/index.php/Home/Content/lst/id/<?php echo ($v["id"]); ?>">
									<img src="<?php echo ($v["pic"]); ?>" alt="<?php echo ($v["artname"]); ?>" width="200" height="120">
								</a>
							</dd>
							<dd class="news-intro"><?php echo ($v["desc"]); ?></dd>
							<dd class="news-info">
								<span><?php echo (strtime($v["updatetime"])); ?></span>
								 阅读(<?php echo ($v["count"]); ?>)
							</dd>
						</dl>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
					<div class="list-page"><?php echo ($page); ?></div>
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
</body></html>