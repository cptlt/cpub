<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>模块</title>
</head>
<body>
<?php if(is_array($modList)): $i = 0; $__LIST__ = $modList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?>模块标题：<?php echo ($row['title']); ?><br>
<!--    模块内容：<?php echo ($row['content']); ?><br>
    模块定位：<?php echo ($row['position']); ?><br>
    是否发布：<?php echo ($row['published']); ?><br>
    模块名：<?php echo ($row['module']); ?><br>-->
    <?php echo W($row['module'],array('params'=>$row['params'])); endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>