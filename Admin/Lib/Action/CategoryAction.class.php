<?php
/**
 * Category控制器(分类控制器)
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