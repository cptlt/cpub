<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>修改资料</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/style/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/style/common.css"/>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/style/User.add.css"/>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="common">
            <div class="out">
                <div class="out-header">
                    <a class="strong a"><h4 class="welcome" id="welcome">修改资料</h4></a>
                </div>
                <div class="visibility"></div>
                <form action="__URL__/update" method="post">
                    <table>
                        <tr>
                            <td class="first-td">用户名 :</td>
                            <td class="second-td"><input class="form-control keywords" type="text" name="username"
                                                         value="<?php echo ($data['username']); ?>"/></td>
                        </tr>
                        <tr>
                            <td class="first-td">密码 :</td>
                            <td class="second-td"><input class="form-control keywords" type="password" name="password"/></td>
                        </tr>
                        <tr>
                            <td class="first-td">昵称 :</td>
                            <td class="second-td"><input class="form-control keywords" type="text" name="name"
                                                         value="<?php echo ($data['name']); ?>"/></td>
                        </tr>
                        <tr>
                            <td class="first-td">邮箱 :</td>
                            <td class="second-td"><input class="form-control keywords" type="text" name="email"
                                                         value="<?php echo ($data['email']); ?>"/></td>
                        </tr>
                        <tr>
                            <td class="first-td">激活 :</td>
                            <td class="second-td">
                                <input class="ridio" type="radio" name="active" value="1" checked="checked"/>是
                                <input class="ridio" type="radio" name="active" value="0"/>否
                            </td>
                        </tr>
                        <tr>
                            <td class="first-td">用户组</td>
                            <td class="second-td">
                                <select name="role_id" size="1">
                                    <?php if(is_array($roleList)): $i = 0; $__LIST__ = $roleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$role): $mod = ($i % 2 );++$i;?><option value="<?php echo ($role['id']); ?>" <?php if(($data['role_id']) == $role['id']): ?>selected="selected"<?php endif; ?>><?php echo ($role['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                        </tr>

                        <input type="hidden" name="id" value="<?php echo ($data['id']); ?>"/>
                        <input type="hidden" name="oldPassword" value="<?php echo ($data['password']); ?>">
                        <tr>
                            <td></td>
                            <td><input class="btn btn-default submit" type="submit" value="提交"></td>
                        </tr>

                    </table>


                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>