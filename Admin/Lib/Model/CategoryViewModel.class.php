<?php
/**
 * 分类视图模型
 * 主要用在查询上，去除多张表显示模型，比较直观
 * User: Inen
 * Date: 2015/4/9
 * Time: 18:44
 */

class CategoryViewModel extends ViewModel{

    protected $viewFields = array(
        //取出Category表中的我们需要的数据(自动检测数据表信息)
        'Category'=>array(
            'id'=>'cid',
            'title'=>'ctitle',
            'alias'=>'calias',
            'published'=>'cpublished',
            'torder'=>'ctorder',
            'access'=>'caccess',
            'sectionid',
        ),
        //Section表中的数据
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
