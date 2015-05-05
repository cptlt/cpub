<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>编辑用户</title>
</head>
<body>
<form action="<?php echo U('User/update');?>" method="post">
    用户名：<input type="text" name="username" value="<?php echo ($data['username']); ?>"/><br>
    密 码：<input type="password" name="pwd"/><br>
    昵 称：<input type="text" name="name" value="<?php echo ($data['name']); ?>"/><br>
    邮 箱：<input type="text" name="email" value="<?php echo ($data['email']); ?>"/><br>

    用户组：<select name="role_id" size="5">
    <?php if(is_array($roleList)): $i = 0; $__LIST__ = $roleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><option value="<?php echo ($row['id']); ?>"
        <?php if(($data['role_id']) == $row['id']): ?>selected="selected"<?php endif; ?>
        ><?php echo ($row['name']); ?>
        </option><?php endforeach; endif; else: echo "" ;endif; ?>
</select>
    激 活：是<input type="radio" name="active" value="1" checked="checked"/>
    否<input type="radio" name="active" value="0"/><br>
    <input type="hidden" name="id" value="<?php echo ($data['id']); ?>"/>
    <input type="hidden" name="oldPassword" value="<?php echo ($data['password']); ?>">
    <input type="submit" value="提交">
</form>
</body>
</html>