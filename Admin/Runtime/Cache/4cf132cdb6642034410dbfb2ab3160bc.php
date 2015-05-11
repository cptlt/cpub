<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>文章列表</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/style/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/style/common.css"/>
</head>

<body>
<script type="text/javascript">
    function del(){
        if (window.confirm("确认删除所选文章!")){
            document.adminForm.submit();
        }
    }
</script>

<div class="container">
    <div class="row">
        <div class="common">
            <div class="out">
                <div class="out-header">
                    <a class="strong a"><h4 class="welcome" id="welcome">文章概览</h4></a>
                </div>
                <div class="visibility"></div>

                <form action="__URL__/index" method="post">
                    关键词：
                    <input type="text" name="keywords" class="form-control keywords ">
                    类型：
                    <select name="type">
                        <option value="atitle">文章标题</option>
                        <option value="ctitle">分类</option>
                        <option value="stitle">单元</option>
                        <option value="apublished">发布情况</option>
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
                    <table class="table table-bordered table-striped table-hover" style="margin-top: 10px;">
                        <tr>
                            <th>
                                全选
                            </th>
                            <th>
                                文章标题
                            </th>
                            <th>
                                所属分类
                            </th>
                            <th>
                                所属单元
                            </th>
                            <th>
                                创建者
                            </th>
                            <th>
                                发布情况
                            </th>
                            <th>
                                访问量
                            </th>
                            <th>
                                创建时间
                            </th>
                        </tr>

                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Article): $mod = ($i % 2 );++$i;?><tr>
                                <td>
                                    <input type="checkbox" name="did[]" value="<?php echo ($Article['aid']); ?>">
                                </td>
                                <td><a href="__URL__/edit/id/<?php echo ($Article['aid']); ?>"><?php echo ($Article["atitle"]); ?></a>
                                </td>
                                <td><?php echo ($Article['ctitle']); ?></td>
                                <td><?php echo ($Article['stitle']); ?></td>
                                <td><?php echo ($Article['username']); ?></td>
                                <td><?php echo ($Article['apublished']); ?></td>
                                <td><?php echo ($Article['hits']); ?></td>
                                <td><?php echo ($Article['created']); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        <tr>
                            <td colspan="8">
                                <?php echo ($page); ?>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="__PUBLIC__/script/User.index.js" type="text/javascript" charset="utf-8"></script>
<script src="__PUBLIC__/script/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="__PUBLIC__/script/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $('.dropdown-toggle').dropdown();
</script>
</body>


</html>