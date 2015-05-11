<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>单元列表</title>
</head>
<body>

<script type="text/javascript">
    function del(){
        if(window.confirm("确认删除所选单元以及相关单元下的所有分类？")){
            document.adminForm.submit();
        }
    }
</script>

<form action="__URL__/index" method="post">
    关键词：<input type="text" name="keywords">
    类型：<select name="type">
        <option value="title">单元名称</option>
        <option value="id">ID</option>
</select>
    <input type="submit" value="查询">
</form>

<a href="__URL__/add">新建</a>
<a href="__URL__/delete" onclick="del();return false;">删除</a>

<form action="__URL__/delete" name="adminForm" method="post">
    <table border="1">
        <tr>
            <th>
                全选
            </th>
            <th>
                单元名
            </th>
            <th>
                单元别名
            </th>
            <th>
                单元描述
            </th>
            <th>
                启用
            </th>
            <th>
                访问权限等级
            </th>
        </tr>

        <?php if(is_array($sectionList)): $i = 0; $__LIST__ = $sectionList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sec): $mod = ($i % 2 );++$i;?><tr>
                <td>
                    <input type="checkbox" name="did[]" value="<?php echo ($sec['id']); ?>">
                </td>
                <td>
                    <?php echo ($sec['title']); ?>
                </td>
                <td>
                    <?php echo ($sec['alias']); ?>
                </td>
                <td>
                    <?php echo ($sec['description']); ?>
                </td>
                <td>
                    <?php echo ($sec['published']); ?>
                </td>
                <td>
                    <?php echo ($sec['access']); ?>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</form>
</body>
</html>