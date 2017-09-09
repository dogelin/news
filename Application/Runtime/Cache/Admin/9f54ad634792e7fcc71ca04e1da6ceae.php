<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台登录</title>
    <link href="/news/Public/Admin/css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_login_wrap">
    <h1>后台管理</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="" method="post">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="username" value="" id="user" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="pwd" value="" id="pwd" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <button class="btn btn-primary" type="button" onclick="login.check()">提交</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <script src="/news/Public/Admin/js/jquery.js"></script>
    <script src="/news/Public/Admin/js/dialog/layer.js"></script>
    <script src="/news/Public/Admin/js/dialog.js"></script> 
    <script src="/news/Public/Admin/js/login.js"></script>    
</div>
</body>
</html>