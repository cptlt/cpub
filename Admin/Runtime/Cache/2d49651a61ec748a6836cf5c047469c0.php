<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>修改资料</title>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/style/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/style/common.css" />
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
						<form action="<?php echo U('User/update');?>" method="post">
							<table>
								<tr>
									<td class="first-td">用户名 : </td>
									<td class="second-td"><input class="form-control keywords" type="text" name="uname" value="<?php echo ($data['username']); ?>" /></td>
								</tr>
								<tr>
									<td class="first-td">密码 : </td>
									<td class="second-td"><input class="form-control keywords" type="password" name="pwd" /></td>
								</tr>
								<tr>
									<td class="first-td">昵称 : </td>
									<td class="second-td"><input class="form-control keywords" type="text" name="name" value="<?php echo ($data['name']); ?>" /></td>
								</tr>
								<tr>
									<td class="first-td">邮箱 : </td>
									<td class="second-td"><input class="form-control keywords" type="text" name="email" value="<?php echo ($data['email']); ?>" /></td>
								</tr>
								<tr>
									<td class="first-td">激活 : </td>
									<td class="second-td">
										<input class="ridio" type="radio" name="active" value="1" checked="checked" />是
										<input class="ridio" type="radio" name="active" value="0" />否
									</td>
								</tr>
								<input type="hidden" name="id" value="<?php echo ($data['id']); ?>" />
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