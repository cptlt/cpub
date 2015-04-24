<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>后台管理</title>
		<link rel="stylesheet" type="text/css" href="../../../Public/style/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../../../Public/style/Index.index.css" />
	</head>

	<body>
		
		
		<div id="logo"></div>
		<div class="row">
			<div class="pull-left col-sm-3 col-xs-5">
				<div class="manager">
					<h4 class="text-center strong">网站常规管理</h4>
				</div>
				<div>
					<h4 class="text-center strong">菜单管理</h4><ul class="list-group hide">
						<li class="text-center list-group-item">菜单管理</li>
						<li class="text-center list-group-item">主菜单</li>
						<li class="text-center list-group-item">子菜单</li>
						<li class="text-center list-group-item">导航栏</li>
						<li class="text-center list-group-item">热门频道</li>
					</ul>
				</div>
				<div>
					<h4 class="text-center strong">内容管理</h4><ul class="list-group hide">
						<li class="text-center list-group-item">文章管理</li>
						<li class="text-center list-group-item">单元管理</li>
						<li class="text-center list-group-item">分类设置</li>
					</ul>
				</div>
				<div>
					<h4 class="text-center strong">会员权限管理</h4><ul class="list-group hide">
						<li class="text-center list-group-item">会员资料管理</li>
						<li class="text-center list-group-item">会员分组管理</li>
						<li class="text-center list-group-item">会员权限设置</li>
						<li class="text-center list-group-item">会员功能管理</li>
					</ul>
				</div>
				<div>
					<h4 class="text-center strong">拓展管理</h4>
				</div>
				<div>
					<h4 class="text-center strong">工具</h4>
				</div>
			</div>
			<div class="pull-right col-sm-9 col-xs-7" >
				<div class="out">
					<div  class="out-header">
						<a class="strong a"><h4 class="border">会员管理</h4></a>
						<!--<div style="clear: both;float: none;"></div>-->
					</div>
					<div class="col-sm-12">
						<div class="col-sm-8">
							筛选 : <input type="text" class="form-control"/>
								<div class="dropdown" id="dropdown">
									<button class="btn btn-default " type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">Dropdown
								    		<span class="caret"></span>
								  	</button>
								  	<ul class="dropdown-menu hide" id="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
									    	<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
									    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
									    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
									    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
								  	</ul>
								</div>
								<button class="btn btn-primary" id="query">查询</button>
								<button class="btn btn-default" id="clean">清空</button>
						</div>
						<div class="col-sm-4">
							<button type="button" class="btn btn-default" aria-label="Left Align">
							 	<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
								创建
							</button>
							<button type="button" class="btn btn-default" aria-label="Left Align">
							 	<span class="glyphicon glyphicon glyphicon-trash" aria-hidden="true"></span>
								删除
							</button>
							<button type="button" class="btn btn-default" aria-label="Left Align">
							 	<span class="glyphicon glyphicon-baby-formula" aria-hidden="true"></span>
								帮助
							</button>
						</div>
						
					</div>
					<div style="text-align: center;">
						<img src="../../../Public/images/404.png" title="404"/>
					</div>
					
					
					<Iframe class="hidden" style="margin-top: 40px;" src="" width="250" height="200" scrolling="no" frameborder="0">
					</iframe>
				</div>
			</div>
			
		</div>
		

	<script src="../../../Public/script/Index.index.js"></script>
	</body>

</html>