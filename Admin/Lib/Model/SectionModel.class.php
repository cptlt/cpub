<?php
/**
 * 单元模型(继承关联模型)
 * User: Inen
 * Date: 2015/4/9
 * Time: 14:32
 */

class SectionModel extends RelationModel{

    //定义关联关系(主体为单元Section，关联分类Category和文章Article)
    protected $_link = array(
        'Category'=>array(
            'mapping_type'=>HAS_MANY,     //定义为HAS_MANY关联关系
            'class_name'=>'Category',     //类名为分类
            'foreign_key'=>'sectionid',   //实现关联的外键(为分类表中的字段)
            'mapping_name'=>'categorys', //映射的时候作为字段名
            'mapping _order'=>'sectionid desc',
        ),

        'Article'=>array(
            'mapping_type'=>HAS_MANY,     //定义为HAS_MANY关联关系
            'class_name'=>'Article',     //类名为分类
            'foreign_key'=>'sectionid',   //实现关联的外键(为分类表中的字段)
            'mapping_name'=>'articles', //映射的时候作为字段名
        ),
    );

    //表单数据验证
    protected $_validate = array(
        array('title','require','单元名称必须存在！',1,'regex',3),

    );

    //自动填充
    protected $_auto = array(
        array('alias','getAlias',1,'callback'),
    );

    /**
     * 别名的自动填充
     */
    function getAlias(){
        if(empty($_POST['alias'])){
            return date('Y-m-d H:i:s');
        }else{
            //需加入判断别名必须是字母，不能是中文，中文则另外创建然后返回，字母则直接返回
            return $_POST['alias'];
        }
    }

    //字段映射
    protected $_map = array(

    );

    //
}