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
<!--    &lt;!&ndash;加载单元描述编辑器的容器&ndash;&gt;
    <script id="container" name="sectionAdd" type="text/plain">
        写入关于单元的描述信息
    </script>
    &lt;!&ndash;配置文件&ndash;&gt;
    <script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.config.js"></script>
    &lt;!&ndash; 编辑器源码文件 &ndash;&gt;
    <script type="text/javascript" src="__PUBLIC__/ueditor/ueditor.all.js"></script>
    &lt;!&ndash; 实例化编辑器 &ndash;&gt;
    <script type="text/javascript">
        var ue = UE.getEditor('container',{
            autoHeight: false,
            toolbars:[
                         ['fullscreen', 'source', 'undo', 'redo'],
                         ['bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc']
                    ]
        });
    </script>-->

</form>
</body>
</html>