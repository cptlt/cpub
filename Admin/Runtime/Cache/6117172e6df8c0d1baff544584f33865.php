<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form action="<?php echo U('User/insert');?>" method="post">
    用户名：<input type="text" name="uname"/><br>
    密 码：<input type="password" name="pwd"/><br>
    昵 称：<input type="text" name="name"/><br>
    邮 箱：<input type="text" name="email"/><br>
    激 活：<input type="radio" name="active" value="1" checked="checked"/>
    <input type="radio" name="active" value="0"/><br>
    <input type="submit" value="提交">
</form>
</body>
</html>