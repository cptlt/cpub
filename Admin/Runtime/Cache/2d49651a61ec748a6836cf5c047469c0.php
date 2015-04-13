<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>编辑用户</title>
</head>
<body>
<form action="<?php echo U('User/update');?>" method="post">
    用户名：<input type="text" name="uname" value="<?php echo ($data['username']); ?>"/><br>
    密 码：<input type="password" name="pwd" /><br>
    昵 称：<input type="text" name="name" value="<?php echo ($data['name']); ?>"/><br>
    邮 箱：<input type="text" name="email" value="<?php echo ($data['email']); ?>"/><br>
    激 活：<input type="radio" name="active" value="1" checked="checked"/>
    <input type="radio" name="active" value="0"/><br>
    <input type="hidden" name="id" value="<?php echo ($data['id']); ?>" />
    <input type="submit" value="提交">
</form>
</body>
</html>