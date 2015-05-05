<?php
return array(
    //'配置项'=>'配置值'
    'PAGE_SIZE' => 5,//分页大小配置
//    'LOAD_EXT_CONFIG'   =>  'user',
    'URL_MODEL' => 1,//设置URL模式
    'VAR_URL_PARAMS' => '_URL',
    'URL_HTML_SUFFIX'   =>  'shtml|html|xml',
    'SHOW_PAGE_TRACE' => true,
    'MODULES'=>array(
        'Menu'=>'菜单模块',
        'LatestNews'=>'最新文章模块',
    ),

    //数据库配置
    'DB_TYPE' => 'mysql',            //数据库类型
    'DB_HOST' => 'localhost',        //数据库主机
    'DB_NAME' => 'cp',               //数据库名
    'DB_USER' => 'root',             //用户
    'DB_PWD' => '',                 //用户密码
    'DB_PORT' => '3306',             //数据库使用的端口
    'DB_PREFIX' => 'cpub_',            //表前缀

    //RBAC权限验证配置
    'USER_AUTH_ON' => true,               //开启RBAC认证
    'USER_AUTH_TYPE' => 1,                  //使用SESSION进行标记
    'USER_AUTH_KEY' => 'authId',           //设置Session的标识名称
    'ADMIN_AUTH_KEY' => 'root',            //管理员用户标记
    'USER_AUTH_MODEL' => 'User',             //验证用户的表模型
//    'AUTH_PWD_ENCODER'=>'md5',//验证密码加密方式
    'USER_AUTH_GATEWAY' => '/Public/login',//默认的认证网关
    'NOT_AUTH_MODULE' => 'Public',//设置默认不需要验证的控制模块A,B,C
    'REQUEST_AUTH_MODULE' => '',//设置默认必须要进行验证的控制模块
    'NOT_AUTH_ACTION' => '',//设置默认不需要验证的动作
    'REQUEST_AUTH_ACTION' => '',//默认必须要进行验证的动作
    'GUEST_AUTH_ON'=>false,//是否开启游客授权访问
    'GUEST_AUTH_ID'=>0,//游客标记

    'RBAC_ROLE_TABLE'=>'cpub_role',//
    'RBAC_USER_TABLE'=>'cpub_role_user',//
    'RBAC_ACCESS_TABLE'=>'cpub_access',
    'RBAC_NODE_TABLE'=>'cpub_node',

    //定义RBAC认证机制

);
?>