<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>创建分组</title>
</head>
<body>
<form action="__URL__/save" method="post">
    分组名称：<input type="text" name="name" value="<?php echo ($RoleData['name']); ?>"><br>
    分组描述：<textarea name="remark"><?php echo ($RoleData['remark']); ?></textarea>
    <input type="hidden" name="id" value="<?php echo ($RoleData['id']); ?>">
    <input type="submit" value="保存">
</form>
</body>
</html>