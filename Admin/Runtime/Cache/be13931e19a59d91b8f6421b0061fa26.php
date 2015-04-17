<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>选择内容模型</title>
</head>
<body>
<?php if(is_array($comlist)): $i = 0; $__LIST__ = $comlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('MenuItem/component?comid='.$row['id'].'');?>"><?php echo ($row['name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>