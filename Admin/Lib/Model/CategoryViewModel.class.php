<?php
/**
 * 分类视图模型
 * 主要用在查询上，去除多张表显示模型，比较直观
 */

class CategoryViewModel extends ViewModel{

    /*
     * 定义查询表结构
     */
    protected $viewFields = array(
        //取Category表中需要用到的字段
        'Category'=>array(
            'id'=>'cid',
            'title'=>'ctitle',
            'alias'=>'calias',
            'published'=>'cpublished',
            'torder'=>'ctorder',
            'access'=>'caccess',
            'sectionid',
        ),
        //取Section表中需要用到的字段
        'Section'=>array(
            'title'=>'sec_name',
            '_on'=>'Category.sectionid=Section.id',
        ),
    );

}
//select Category.id as cid,Category.title as ctitle ...
//Section.title as sec_name
// from
// Category inner join Section
// on Category.sectionid=Section.id
