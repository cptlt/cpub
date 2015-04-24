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

<script type="text/javascript">
    function del(){
        if(window.confirm('请确认是否删除')){
            document.adminForm.submit();
        }
    }
</script>
<a href="__URL__/add">创建</a>
<a href="__URL__/delete" onclick="del();return false;">删除</a>
<form name="adminForm" action="__URL__/delete" method="post">
<table border="1" bordercolor="black" width="100%">
    <tr>
        <th>
            全选
        </th>
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
        <th>
            所属用户组
        </th>
        <th>
            最后登录时间
        </th>
        <th>
            注册时间
        </th>
    </tr>

    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><tr>
            <td>
                <input type="checkbox" name="did[]" value="<?php echo ($user['id']); ?>">
            </td>
            <td><a href="<?php echo U('User/edit?id='.$user['id'].'');?>"><?php echo ($user["username"]); ?></a>
            </td>
            <td><?php echo ($user['email']); ?></td>
            <td>
                <?php if(($user['active']) == "1"): ?>启用
                    <?php else: ?>
                    禁用<?php endif; ?>
            </td>
            <td><?php echo ($user['id']); ?></td>
            <td>
                <?php echo ($user['group']); ?>
            </td>
            <td><?php echo ($user['last_login_date']); ?></td>
            <td><?php echo ($user['reg_date']); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

    <tr>
        <td colspan="8" align="center">
            <?php echo ($show); ?>
        </td>
    </tr>

</table>
    </form>
</body>
</html>