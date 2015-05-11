<?php

/**
 * 用户模型类
 */
class UserModel extends Model
{

    /*表单的数据验证
     *array(验证的字段(数据表字段 )，验证的规则，错误提示，验证条件（默认0存在则验证，1必须验证，2不为空时验证），附加规则（默认为正则表达式），
     * 验证时间（1插入时验证Model::MODEL_INSERT，2编辑即更新时验证，3全部操作都要验证）)
     */
    protected $_validate = array(

        array('username', 'require', '用户帐号必须填写!', 1, 'regex', 3),
        array('username', 'checkUserName', '用户已经存在！', 1, 'callback', 3),
        array('password', 'require', '密码必须填写！', 0, 'regex', 1),
        array('password', 'checkPwd', '密码长度必须大于6位', 1, 'callback'),
        array('email', 'email', '邮箱格式错误！'),
        array('email', 'checkEmail', '邮箱已经存在！', 1, 'callback', 3),
        array('active', array(0, 1), '数据错误！', 0, 'in'),

    );

    /*
     * 用户名唯一性检测
     */
    function checkUserName()
    {

        $User = M('User');

        if (empty($_POST['id'])) {
            //添加用户时的验证
            if ($User->getByUsername($_POST['username'])) {
                //用户名已经存在
                return false;
            } else {
                return true;
            }
        } else {
            //编辑用户时的验证
            //用户名不与自己相同，与别人进行比较
            if ($User->where("id!={$_POST['id']} and username='{$_POST['email']}'")->find()) {
                //新编辑的用户名已经存在
                return false;
            } else {
                return true;
            }
        }
    }

    /*
     * 邮箱唯一性检测
     */
    function checkEmail()
    {

        $User = M('User');

        if (empty($_POST['id'])) {
            //添加用户时的验证
            if ($User->getByEmail($_POST['email'])) {
                //邮箱已经存在
                return false;
            } else {
                return true;
            }
        } else {
            //编辑用户时的验证(不能和自己以前的邮箱比较，否则会出错)
            //邮箱不与自己相同，与别人进行比较
            if ($User->where("id!={$_POST['id']} and email='{$_POST['email']}'")->find()) {
                //新编辑的邮箱与他人邮箱重复
                return false;
            } else {
                return true;
            }
        }
    }

    /*
     * 用户密码检测
     */
    function checkPwd()
    {
        $password = $_POST['password'];
        if (strlen($password) >= 6) {
            return true;
        } else {
            return false;
        }
    }

    //表单与字段的映射(为安全考虑)
    protected $_map = array(

        'pwd' => 'password',

    );

    //数据的自动完成
    /**
     * array(填充的字段(真实的字段名)，填充的内容，填充的条件，附加规则)
     * @var array
     */
    protected $_auto = array(
        array('reg_date', 'getDate', 1, 'callback'),//注册时间自动填充
        array('password', 'md5', 1, 'function'),    //密码自动加密
    );

    /*
     * 返回注册时间
     */
    function getDate()
    {
        return date('Y-m-d H:i:s');
    }
}