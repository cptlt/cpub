<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>用户列表</title>
</head>
<body>

<form action="<?php echo U('User/index');?>" method="post">
    关键词：<input type="text" name="keywords">
    类型：<select name="type">
    <option value="username">用户名</option>
    <option value="name">昵称</option>
    <option value="id">ID</option>
</select>
    <input type="submit" value="查询">
</form>

<table border="1" bordercolor="black" width="50%">
    <tr>
        <th>
            用户名：
        </th>
        <th>
            邮箱：
        </th>
        <th>
            是否激活
        </th>
        <th>
            ID
        </th>
    </tr>

    <?php if(is_array($ulist)): $i = 0; $__LIST__ = $ulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><tr>
            <td><a href="<?php echo U('User/edit?id='.$user['id'].'');?>"><?php echo ($user["username"]); ?></a>
            </td>
            <td><?php echo ($user['email']); ?></td>
            <td><?php echo ($user['active']); ?></td>
            <td><?php echo ($user['id']); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>

</body>
</html>