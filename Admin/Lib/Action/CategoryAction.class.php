<?php
/**
 * Category控制器(分类控制器)
 * User: Inen
 * Date: 2015/4/9
 * Time: 18:58
 */

class CategoryAction extends CommonAction{

    function index(){

/*        $cat = new CategoryViewModel();
        $list = $cat->select();
        dump($list);*/

        $cat = new CategoryModel();
        $list = $cat->relation(true)->select();
        dump($list);

    }
}