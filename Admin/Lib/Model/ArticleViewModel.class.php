<?php

/**
 * Article视图模型
 */
class ArticleViewModel extends ViewModel
{

    /*定义查询表结构*/
    protected $viewFields = array(

        //取Article表中需要的字段
        'Article' => array(
            'id' => 'aid',
            'title' => 'atitle',
            'introtext',
            'published' => 'apublished',
            'sectionid' => 'asid',
            'catid' => 'acid',
            'created',
            'created_by',
            'torder' => 'atorder',
            'access' => 'aaccess',
            'hits',
        ),

        //取Category表中需要的字段
        'Category' => array(
            'title' => 'ctitle',
            '_on' => 'Category.id=Article.catid',
        ),

        //取Section表中需要的字段
        'Section' => array(
            'title' => 'stitle',
            '_on' => 'Section.id=Article.sectionid',
        ),

        //取User表中需要的字段
        'User' => array(
            'username',
            'name',
            '_on' => 'User.id=Article.created_by',
        ),
    );
}