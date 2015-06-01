<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <title> cpub管理</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="__PUBLIC__/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/assets/css/main-min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="header">
    <div class="dl-title">
            <span class="lp-title-port">cpub</span><span class="dl-title-text">蓝雨</span>
    </div>

    <div class="dl-log">欢迎您，<span class="dl-log-user"><?php echo ($user); ?></span><a href="__APP__/Public/logout" title="退出系统" class="dl-log-quit">[退出]</a><a href="http://http://sc.chinaz.com/" title="文档库" class="dl-log-quit">文档库</a>
    </div>
</div>
<div class="content">
    <div class="dl-main-nav">
        <div class="dl-inform"><div class="dl-inform-title">贴心小秘书<s class="dl-inform-icon dl-up"></s></div></div>
        <ul id="J_Nav"  class="nav-list ks-clear">
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">蓝雨首页</div></li>
            <li class="nav-item"><div class="nav-item-inner nav-supplychain">基础功能</div> </li>
            <li class="nav-item"><div class="nav-item-inner nav-order">扩展管理</div></li>
        </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
</div>
<script type="text/javascript" src="__PUBLIC__/assets/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/assets/js/bui.js"></script>
<script type="text/javascript" src="__PUBLIC__/ assets/js/config.js"></script>

<script>
    BUI.use('common/main',function(){

        var config=[{
            id: 'menu',
            homePage: 'code',
            menu: [{
                text: '用户管理',
                items: [
                    {id: 'code', text: '会员列表', href: "__APP__/User/index",closeable:'false'},
                    {id: 'main-menu', text: '新增会员', href: '__APP__/User/add'},
                    {id: 'second-menu', text: '编辑会员', href: '__APP__/User/edit'},
//                    {id: 'dyna-menu', text: '动态菜单', href: 'main/dyna-menu.html'}
                ]
            }/*, {
                text: '',
                items: [
                    {id: 'operation', text: '页面常见操作', href: 'main/operation.html'},
                    {id: 'quick', text: '页面操作快捷方式', href: 'main/quick.html'}
                ]
            }, {
                text: '文件结构',
                items: [
                    {id: 'resource', text: '资源文件结构', href: 'main/resource.html'},
                    {id: 'loader', text: '引入JS方式', href: 'main/loader.html'}
                ]
            }]*/
            ]
        }, {
            id: 'form',
            menu: [{
                text: '单元管理',
                items: [
                    {id: 'code', text: '单元列表', href: '__APP__/Section/index'},
                    {id: 'example', text: '新增单元', href: '__APP__/Section/add'},
                    {id: 'introduce', text: '编辑单元', href: '__APP__/Section/edit'},
//                    {id: 'valid', text: '表单基本验证', href: 'form/basicValid.html'},
//                    {id: 'advalid', text: '表单复杂验证', href: 'form/advalid.html'},
//                    {id: 'remote', text: '远程调用', href: 'form/remote.html'},
//                    {id: 'group', text: '表单分组', href: 'form/group.html'},
//                    {id: 'depends', text: '表单联动', href: 'form/depends.html'}
                ]
            }, {
                text: '菜单管理',
                items: [
                    {id: 'Menuindex', text: '菜单管理', href: '__APP__/Menu/index'},
                    {id: 'Menuadd', text: '添加菜单', href: '__APP__/Menu/add'},
                    {id: 'Menuedit', text: '编辑菜单', href: '__APP__/Menu/edit'}
                ]
            }, {
                text: '菜单项管理',
                items: [
                    {id: 'grid', text: '菜单项列表', href: '__APP__/MenuItem/index'},
                    {id: 'form-grid', text: '添加菜单项', href: '__APP__/MenuItem/add'},
                    {id: 'dialog-grid', text: '编辑菜单项', href: '__APP__/MenuItem/edit'},
                ]
            }]
        }, {
            id: 'search',
            menu: [{
                text: '文章管理',
                items: [
                    {id: 'code', text: '文章列表', href: '__APP__/Article/index'},
                    {id: 'example', text: '新建文章', href: '__APP__/Article/add'},
                    {id: 'example-dialog', text: '编辑文章', href: '__APP__/Article/edit'},
                ]
            }, {
               text: '用户组管理',
                items: [
                    {id: 'groupList', text: '用户组', href: '__APP__/Role/index'},
                    {id: 'groupAdd', text: '添加新组', href: '__APP__/Role/add'},
                    {id: 'groupEdit', text: '编辑组',href: '__APP__/Role/edit'}
                ]
            }, {
                text: '模版管理',
                items: [
                    {id: 'tab', text: '模版管理', href: '__APP__/Modules/index'}
                ]
            },{
                text: '个性编辑',
                items: [
                    {id: 'code',text: '网站标语', href: ''}
                ]
            }]
        }];

        new PageUtil.MainPage({
            modulesConfig : config
        });
    });
</script>
</body>
</html>