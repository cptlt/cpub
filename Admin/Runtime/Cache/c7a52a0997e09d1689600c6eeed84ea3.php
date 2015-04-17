<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>添加菜单项</title>
</head>
<body>
<form action="<?php echo U('MenuItem/insert');?>" method="post">
    菜单名称：<input type="text" name="name"><br>
    上层菜单项：<select size="20" name="pid">
    <option value="0" selected="selected">顶层菜单</option>
    <?php if(is_array($mlist)): $i = 0; $__LIST__ = $mlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><option value="<?php echo ($row['id']); ?>">
            <?php
 for($i=0;$i<$row['marginnum']/5;$i++){ echo "&nbsp;"; } ?>
            <?php echo ($row['name']); ?>
        </option><?php endforeach; endif; else: echo "" ;endif; ?>
</select>
    <input type="hidden" name="menuid" value="1"><br> <!--这里的menuid需自己获取(因为我们必须知道往哪个菜单下添加菜单项)，这里我们渐变一下-->
    <input type="submit" value="保存">
</form>
</body>
</html>