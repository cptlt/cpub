<?php
/**
 * 用户模型类操作user用户表
 * User: Inen
 * Date: 2015/4/3
 * Time: 8:46
 */

class UserModel extends Model {

    /*表单的数据验证
     *array(验证的字段(数据表字段 )，验证的规则，错误提示，验证条件（默认0存在则验证，1必须验证，2不为空时验证），附加规则（默认为正则表达式），
     * 验证时间（1插入时验证Model::MODEL_INSERT，2编辑即更新时验证，3全部操作都要验证）)
     */
    protected $_validate = array(

        array('username','require','用户帐号必须填写!',1,'regex',3),
        //array('uname','','用户已经存在！',1,'unique',1),
        array('password','require','密码必须填写！'),
        array('email','email','邮箱格式错误！'),
        array('active',array(0,1),'数据错误！',0,'in'),
        array('password','checkPwd','密码长度必须大于6位',1,'callback'),

    );

    function checkPwd(){
        $password = $_POST['pwd'];
        if(strlen($password) >= 6){
            return true;
        }else{
            return false;
        }
    }

    //表单与字段的映射(为安全考虑)
    protected $_map = array(

        'uname' => 'username',
        'pwd'   => 'password',

    );

    //数据的自动完成
    /**
     * array(填充的字段(真实的字段名)，填充的内容，填充的条件，附加规则)
     * @var array
     */
    protected $_auto = array(
        array('reg_date','getDate',1,'callback'),//注册时间自动填充
        array('password','md5',1,'function'),    //密码自动加密
    );

    function getDate(){
        return date('Y-m-d H:i:s');
    }
}