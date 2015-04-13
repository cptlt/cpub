<?php
/**
 * 自定义公共函数库.
 * User: Inen
 * Date: 2015/4/3
 * Time: 9:35
 */

/**
 * UserModel类表单数据验证函数
 * @return bool
 */
function checkPwd(){

    $password = $_POST['pwd'];
    if(strlen($password) >= 6){
        return true;
    }else{
        return false;
    }
}