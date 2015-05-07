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
        <option value="published">已启用单元</option>
</select>
    <input type="submit" value="查询">
</form>

<a href="__URL__/add">新建</a>
<a href="__URL__/delete" onclick="del();return false;">删除</a>

<form action="__URL__/delete" name="adminForm" method="post">
    <table>
        <tr>
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
    </table>
</form>
</body>
</html>