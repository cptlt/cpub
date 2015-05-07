<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>后台管理</title>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/style/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/style/Index.index.css" />
	</head>

	<body>
		<div id="logo"></div>
		<div class="container">
			<div class="row">
				<div class="pull-left col-sm-3 col-xs-6">
					<div class="manager">
						<h4 class="text-center strong">网站常规管理</h4>
					</div>
					<div>
						<h4 class="text-center strong">菜单管理</h4>
						<ul class="list-group hide" id="menu">
							<li class="text-center list-group-item">主菜单</li>
							<li class="text-center list-group-item">子菜单</li>
							<li class="text-center list-group-item">导航栏</li>
							<li class="text-center list-group-item">热门频道</li>
						</ul>
					</div>
					<div>
						<h4 class="text-center strong">内容管理</h4>
						<ul class="list-group hide" id="content">
							<li class="text-center list-group-item">文章管理</li>
							<li class="text-center list-group-item">单元管理</li>
							<li class="text-center list-group-item">分类设置</li>
						</ul>
					</div>
					<div>
						<h4 class="text-center strong">会员权限管理</h4>
						<ul class="list-group hide" id="vip">
							<li class="text-center list-group-item">会员一览</li>
							<li class="text-center list-group-item">添加会员</li>
							<li class="text-center list-group-item">修改资料</li>
						</ul>
					</div>
					<div>
						<h4 class="text-center strong">拓展管理</h4>
					</div>
					<div>
						<h4 class="text-center strong">工具</h4>
					</div>
				</div>

				<div class="pull-right col-sm-9 col-xs-6">
					<Iframe id="external-frame" style=" width: 100%;" src="welcome.html" scrolling="no" frameborder="0" onload="setIframeHeight(this)">
					</iframe>
				</div>
			</div>
		</div>
		<script src="__PUBLIC__/script/Index.index.js"></script>
	</body>

</html>