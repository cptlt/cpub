<?php
/**
 * 分类模型(继承关联模型)
 * User: Inen
 * Date: 2015/4/10
 * Time: 9:51
 */

class CategoryModel extends RelationModel{

    //定义关联关系(主体为分类Category，关联单元Section和文章Article)
    protected $_link = array(
        'Section'=>array(
            'mapping_type'=>BELONGS_TO,
            'class_name'=>'Section',
            'foreign_key'=>'sectionid',
            'mapping_name'=>'sections',
            'as_fields'=>'title:sec_title,description:desc',
        ),
        'Article'=>array(
            'mapping_type'=>HAS_MANY,
            'class_name'=>'Article',
            'foreign_key'=>'catid',
            'mapping_name'=>'articles',
        ),
    );

    //删除单元，同时删除单元所包含的类以及文章


    //删除分类时，同时删除包含的文章

    //查询操作

}