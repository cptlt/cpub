<?php

/**
 * 文章模型
 */
class ArticleModel extends Model
{

    /*
     * 表单数据验证
     */
    protected $_validate = array(

        array('title', 'require', '文章标题必须填写！', 1),
        array('alias', 'require', '文章别名必须填写！', 1,'regex',3),
        array('title_alias', 'require', '文章简介必须填写！', 1,'regex',3),
        array('introtext', 'require', '文章标题必须存在！', 1,'regex',3),
        array('published', array(0, 1), '取值范围错误！', 0, 'in'),

    );

    /*
     * 自动完成
     */
    protected $_auto = array(
        array('alias', 'getAlias', 3, 'callback'),
        array('title_alias', 'getTitleAlias', 3, 'callback'),
        array('created', 'getDate', 1, 'callback'),
        array('created_by', 'getUser', 1, 'callback'),
        array('modified', 'getDate', 2, 'callback'),
        array('modified_by', 'getUser', 2, 'callback'),
    );

    //回调函数getAlias，返回文章别名
    function getAlias()
    {
        if (empty($_POST['alias'])) {
            return date("Y-m-d H:i:s");
        } else {
            return $_POST['alias'];
        }
    }

    //回调函数getTitleAlias，返回标题别名
    function getTitleAlias()
    {
        if (empty($_POST['title_alias'])) {
            return substr(strip_tags($_POST['introtext']), 0, 40);
        } else {
            return $_POST['title_alias'];
        }
    }

    //回调函数getDate，返回创建日期
    function getDate()
    {
        return date("Y-m-d H:i:s");
    }

    //回调函数getUser，返回当前登录的用户名
    function getUser()
    {
        return $_SESSION[C('USER_AUTH_KEY')];
    }
}