/*文章单元表*/
CREATE TABLE cpub_section(
id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
title VARCHAR(255) NOT NULL,
  alias VARCHAR(255) NOT NULL ,
  description TEXT NOT NULL ,
  published TINYINT(1) NOT NULL DEFAULT 0,
  torder INT NOT NULL DEFAULT 0,
  aceess TINYINT(3) UNSIGNED NOT NULL DEFAULT 0,
  params TEXT NOT NULL
)ENGINE = MYISAM;

/*文章分类表*/
CREATE TABLE cpub_category(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  title VARCHAR(255) NOT NULL,
  alias VARCHAR(255) NOT NULL ,
  description TEXT NOT NULL ,
  published TINYINT(1) NOT NULL ,
  torder INT NOT NULL ,
  access TINYINT(3) UNSIGNED NOT NULL ,
  sectionid INT UNSIGNED NOT NULL ,
  params TEXT NOT NULL
)ENGINE = MYISAM;

/*文章表*/
CREATE TABLE cpub_article(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  title VARCHAR(255) NOT NULL,
  alias VARCHAR(255) NOT NULL ,
  title_alias VARCHAR(255) NOT NULL ,
  introtext MEDIUMTEXT NOT NULL ,
  published TINYINT(1) NOT NULL DEFAULT 0,
  sectionid INT UNSIGNED NOT NULL ,
  catid INT UNSIGNED NOT NULL ,
  created DATE NOT NULL ,
  created_by INT UNSIGNED NOT NULL ,
  modefied DATETIME NOT NULL ,
  modefied_by INT UNSIGNED NOT NULL ,
  published_up DATETIME NOT NULL ,
  published_down DATETIME NOT NULL ,
  torder INT NOT NULL DEFAULT 0,
  access TINYINT(3) UNSIGNED NOT NULL DEFAULT 0,
  metakey TEXT NOT NULL ,
  metadesc TEXT NOT NULL ,
  hits INT UNSIGNED NOT NULL ,
  metadata TEXT NOT NULL ,
  params TEXT NOT NULL ,
  INDEX (sectionid),
  INDEX (catid),
  INDEX (created_by)
)ENGINE = MYISAM;

/*菜单表*/
CREATE TABLE cpub_menu(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  title VARCHAR(255) NOT NULL ,
  menutype VARCHAR(75) NOT NULL ,
  description TEXT NOT NULL ,
  UNIQUE(menutype)
)ENGINE = MYISAM;

/*菜单组件表*/
CREATE TABLE cpub_component(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  name VARCHAR(50) NOT NULL ,
  link VARCHAR(255) NOT NULL ,
  toption VARCHAR(50) NOT NULL ,
  torder INT NOT NULL DEFAULT '0',
  params TEXT NOT NULL ,
  enabled TINYINT(4) NOT NULL DEFAULT 1
)ENGINE MYISAM;

/*菜单项表*/
CREATE TABLE cpub_menu_item(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  name VARCHAR(255) NOT NULL ,
  menuid INT UNSIGNED NOT NULL ,
  alias VARCHAR(255) NOT NULL ,
  link TEXT NOT NULL ,
  type VARCHAR(50) NOT NULL ,
  published TINYINT(1) NOT NULL DEFAULT '0',
  pid INT UNSIGNED NOT NULL DEFAULT '0',
  path TEXT NOT NULL ,
  componentid INT UNSIGNED NOT NULL ,
  torder INT NOT NULL DEFAULT '0',
  browserNav TINYINT(4) NOT NULL DEFAULT '0',
  access TINYINT(3) UNSIGNED NOT NULL DEFAULT 0,
  params TEXT NOT NULL
)ENGINE MYISAM;

/*用户角色表*/
CREATE TABLE `cpub_role`(
  `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '角色分组ID',
  `name` VARCHAR(20) NOT NULL COMMENT '角色分组名',
  `pid` SMALLINT(6) NOT NULL COMMENT '父分组编号',
  `status` TINYINT(3) UNSIGNED NOT NULL COMMENT '分组状态',
  `remark` VARCHAR(255) NOT NULL COMMENT '分组描述',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`,`status`)
)ENGINE=MYISAM DEFAULT CHARSET=utf8 COMMENT='角色分组信息';

/*管理员分类明细表*/
CREATE TABLE `cpub_role_user`(
  `role_id` MEDIUMINT(8) UNSIGNED NOT NULL COMMENT '角色分组编号',
  `user_id` MEDIUMINT(8) UNSIGNED NOT NULL COMMENT '会员编号',
  PRIMARY KEY (`role_id`,`user_id`),
  key `role_id` (`role_id`,`user_id`)
)ENGINE=MYISAM DEFAULT CHARSET=utf8 COMMENT='角色分组明细';

/*管理员操作权限表*/
CREATE TABLE  `cpub_node`(
  `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '管理员操作权限节点编号',
  `name` VARCHAR(20) NOT NULL COMMENT '项目名|模块名|操作名',
  `title` VARCHAR(50) NOT NULL COMMENT '节点',
  `status` TINYINT(3) UNSIGNED NOT NULL COMMENT '节点状态',
  `remark` VARCHAR(255) NOT NULL COMMENT '详细描述',
  `sort` SMALLINT(5) UNSIGNED NOT NULL COMMENT '节点排序',
  `pid` SMALLINT(5) UNSIGNED NOT NULL COMMENT '父节点编号',
  `level` TINYINT(3) UNSIGNED NOT NULL COMMENT '节点分级1 2 3',
  PRIMARY KEY (`id`),
  key `name` (`name`,`status`,`pid`)
)ENGINE=MYISAM DEFAULT CHARSET=utf8 COMMENT='权限节点信息表';

/*权限分配明细表*/
CREATE TABLE `cpub_access`(
  `role_id` SMALLINT(5) UNSIGNED NOT NULL COMMENT '角色分组编号',
  `node_id` SMALLINT(5) UNSIGNED NOT NULL COMMENT '权限节点编号',
  `level` TINYINT(4) NOT NULL COMMENT '分配权限节点的等级',
  `pid` SMALLINT(6) NOT NULL COMMENT '分配权限节点的父节点',
  PRIMARY KEY (`role_id`,`node_id`) COMMENT '联合主键',
  KEY `role_id` (`role_id`,`node_id`)
)ENGINE=MYISAM DEFAULT CHARSET=utf8 COMMENT='权限分配明细表';

/*widget模块表*/
CREATE TABLE  `cpub_modules`(
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT '模块id',
  `title` VARCHAR(50) NOT NULL COMMENT '模块标题',
  `content` VARCHAR(255) NOT NULL COMMENT '模块内容',
  `order` INT NOT NULL COMMENT '排序',
  `position` VARCHAR(50) NOT NULL COMMENT '模块定位',
  `published` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '是否发布',
  `module` VARCHAR(255) NOT NULL COMMENT '模块名',
  `access` TINYINT(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '访问等级',
  `showtitle` TINYINT(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否显示标题',
  params TEXT NOT NULL
)ENGINE=MYISAM DEFAULT CHARSET=utf8 COMMENT='Widget模块表';