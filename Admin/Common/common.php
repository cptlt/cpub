<?php
/**
 * 自定义公共函数库.
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