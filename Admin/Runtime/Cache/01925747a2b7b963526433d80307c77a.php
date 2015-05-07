<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>创建单元</title>
    <script type="text/javascript" src="__PUBLIC__/ckeditor/ckeditor.js"></script>
</head>
<body>
<form action="<?php echo U('Section/insert');?>" method="post">
    单元名称：<input type="text" name="title" /><br>
    单元描述：<textarea name="description"></textarea>
            <script type="text/javascript">
                function onLoadCK(){
                    CKEDITOR.replace('description',{
                        BasePath: "__PUBLIC__/ckeditor",
                        width:700,
                        height:300
                    });
                }
                window.onload = onLoadCK();
                function fnOnSubmit(form){
                    var obj = CKEDITOR.instances.description.getData();
                    obj.UpdateLinkedField();
                }
            </script>
            <input type="submit" value="提交">

</form>
</body>
</html>