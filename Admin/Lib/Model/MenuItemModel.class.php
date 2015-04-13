<?php
/**
 * 菜单项模型
 * User: Inen
 * Date: 2015/4/10
 * Time: 17:23
 */

class MenuItemModel extends RelationModel {

    //表单数据验证
    protected $_validate = array(
        array('name','require','菜单项名称必须填写！',1),

    );

    //自动填充
    protected $_auto = array(
        array('path','getPath',3,'callback'),
    );

    /*编号     标题       父编号       路径
     *1       新闻        0           0
     *2       国内新闻     1          0-1
     *3       国内财经     2          0-1-2
     *4       国外新闻     1          0-1
     *5       国外财经     4          0-1-4
     */
    function getPath(){

        //获取父菜单项编号(用户创建菜单项的时候会选择父菜单)
        $pid = $_POST['pid'];

        //获取父菜单的数据(目地是得到path)
        $pm = $this->field('id,path')->getById($pid);
        $path = $pid!=0?$pm['path'].'-'.$pm['id']:0;

        return $path;
    }
}