<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>用户登录</title>
</head>
<body>
<form action="<?php echo U('Public/checkLogin');?>" method="post">
    用户名:<input type="text" name="username"><br>
    密码：<input type="password" name="password"><br>
    验证码：<input type="text" name="verify"><img src="__URL__/verify" alt="验证码"><br>
    <input type="submit" value="登录">
</form>
</body>
</html>