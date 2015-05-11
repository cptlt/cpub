<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>编辑文章</title>
    <link rel="stylesheet" href="__PUBLIC__/kindeditor-4.1.10/themes/simple/simple.css" />
    <link rel="stylesheet" href="__PUBLIC__/kindeditor-4.1.10/plugins/code/prettify.css" />
    <script charset="utf-8" src="__PUBLIC__/kindeditor-4.1.10/kindeditor.js"></script>
    <script charset="UTF-8" src="__PUBLIC__/kindeditor-4.1.10/lang/zh_CN.js"></script>
    <script charset="utf-8" src="__PUBLIC__/kindeditor-4.1.10/plugins/code/prettify.js"></script>
    <script>
        KindEditor.ready(function(K){
            var editor1 = K.create('textarea[name="introtext"]',{
                cssPath:  '__PUBLIC__/kindeditor-4.1.10/plugins/code/prettify.css',
                uploadJson : '__PUBLIC__/kindeditor-4.1.10/php/upload_json.php',
                fileManagerJson : '__PUBLIC__/kindeditor-4.1.10/php/file_manager_json.php',
                allowFileManager : true,
                afterCreate : function() {
                    var self = this;
                    K.ctrl(document, 13, function() {
                        self.sync();
                        K('form[name=editArticle]')[0].submit(); // name=form表单的name属性
                    });
                    K.ctrl(self.edit.doc, 13, function() {
                        self.sync();
                        K('form[name=editArticle]')[0].submit(); // name=form表单的name属性
                    });
                }
            });

            prettyPrint();
        });

        var cat = new Array;
        cat[0] = new Array('-1','-1','请选择文章类别');

        <?php if(is_array($category)): $k = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat): $mod = ($k % 2 );++$k;?>cat[<?php echo ($k); ?>] = new Array('<?php echo ($cat["sectionid"]); ?>','<?php echo ($cat["id"]); ?>','<?php echo ($cat["title"]); ?>');<?php endforeach; endif; else: echo "" ;endif; ?>

            //表单联动，根据单元选择得到该单元下的分类，用DOM显示在下拉菜单中
        function changeCatList(){
            var secobj = document.editArticle.sectionid;
            var catobj = document.editArticle.catid;

            //清空原来的数据
            catobj.innerHTML = "";
            //options返回select元素中的所有option的一个数组
            var sid = secobj.options[secobj.selectedIndex].value;
            //循环,取得cat数组中的数据，并且生成option元素
            for(var i= 0,j=0;i<cat.length;i++){
                //如果cat数组中的某个值和表单中选中的分类的相同
                if(cat[i][0] == sid){
                    //生成option元素
                    var opt = new Option();
                    opt.value = cat[i][1];  //option元素的value值为catid，即分类id
                    opt.text = cat[i][2];   //option元素的文本
                    catobj.options[j++] = opt;
                }
            }

            //如果最终该单元下没有分类
            if(catobj.options.length<1){
                //生成一个option元素（新的分类）
                var opt = new Option();
                opt.value = cat[0][1];
                opt.text = cat[0][2];
                catobj.options[0] = opt;
            }
        }
    </script>
</head>
<body>
<form action="__URL__/update" name="editArticle" method="post">
    文章标题：<input type="text" name="title" value="<?php echo ($data['title']); ?>">
    别名：<input type="text" name="alias" value="<?php echo ($data['alias']); ?>"><br>
    文章简介：
    <textarea name="title_alias"><?php echo ($data['title_alias']); ?></textarea><br>
    正文：
    <textarea name="introtext" style="width:700px;height: 300px;"><?php echo ($data['introtext']); ?></textarea><br>
    是否发布:
    是<input type="radio" name="published" value="1" checked="checked">
    否<input type="radio" name="published" value="0">
    所属单元：
    <select name="sectionid" onchange="changeCatList();">
        <option value="-1">请选择文章所属单元</option>
        <?php if(is_array($section)): $i = 0; $__LIST__ = $section;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sec): $mod = ($i % 2 );++$i;?><option value="<?php echo ($sec['id']); ?>"><?php echo ($sec['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
    </select>
    所属分类：
    <select name="catid">
        <option value="-1">请选择文章所属分类</option>
    </select><br>
    <input type="hidden" name="id" value="<?php echo ($data['id']); ?>">
    <input type="submit" value="保存">
</form>
</body>
</html>