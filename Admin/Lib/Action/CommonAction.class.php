<?php
/**
 * 公共控制器(用来自定义共有的控制器行为)
 * User: Inen
 * Date: 2015/4/3
 * Time: 10:11
 */

class CommonAction extends Action {

    function _initialize(){
        header('Content-Type:text/html;charset=utf-8');
    }
}