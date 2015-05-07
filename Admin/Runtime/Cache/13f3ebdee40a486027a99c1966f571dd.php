<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>用户组管理</title>
</head>
<body>

<script type="text/javascript">
function del(){
    if (window.confirm("请确认是否删除用户的相应权限授予!")){
        document.adminForm.submit();
    }
}
</script>

<form action="__URL__/index" method="post">
    关键词：
    <input type="text" name="keywords" class="form-control keywords ">
    类型：
    <select name="type">
        <option value="name">分组</option>
        <option value="id">ID</option>
    </select>
    <input class="btn btn-primary" type="submit" value="查询">

    <div class="btn btn-default visibility"></div>
    <a class="btn btn-success" id="add" href="__URL__/add"> <span class="glyphicon glyphicon-plus"
                                                                  aria-hidden="true"></span> 添加 </a>
    <a class="btn btn-danger" id="delete" href="__URL__/delete" onclick="del();return false;"> <span class="glyphicon glyphicon-edit"
                                                                                                     aria-hidden="true"></span> 删除
    </a>
    <a class="btn btn-info" id="help" href="#"> <span class="glyphicon glyphicon-question-sign"
                                                      aria-hidden="true"></span> 帮助 </a>
</form>

<form name="adminForm" action="__URL__/delete" method="post">
    <table border="1" bordercolor="black" width="100%">
        <tr>
            <th>全选</th>
            <th>分组名</th>
            <th>分组描述</th>
            <th>操作</th>
            <th>ID</th>
        </tr>

        <?php if(is_array($RoleList)): $i = 0; $__LIST__ = $RoleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$role): $mod = ($i % 2 );++$i;?><tr>
                <td>
                    <input type="checkbox" name="did[]" value="<?php echo ($role['id']); ?>">
                </td>
                <td>
                    <a href="__URL__/edit/id/<?php echo ($role['id']); ?>"><?php echo ($role['name']); ?></a>
                </td>
                <td>
                    <?php echo ($role['remark']); ?>
                </td>
                <td>
                    <a href="#">授权</a>  <a href="__APP__/User/index/<?php echo ($role['id']); ?>">查看用户</a>
                </td>
                <td>
                    <?php echo ($role['id']); ?>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <tr>
            <td colspan="5" align="center">
                <?php echo ($show); ?>
            </td>
        </tr>
    </table>
</form>
</body>
</html>