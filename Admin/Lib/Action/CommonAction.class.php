<?php
/**
 * 公共控制器(用来自定义共有的控制器行为)
 */

class CommonAction extends Action {

    function _initialize(){
        header('Content-Type:text/html;charset=utf-8');

        //第一步:判断用户是否开启了权限验证 当前控制模块是否不需要验证
        if(C('USER_AUTH_ON') && !in_array(MODEL_NAME,explode(',',C('NOT_AUTH_MODULE')))){
            //第二步：开始认证,导入RBAC类
            import('ORG.Util.RBAC');
            //判断不通过验证
            if(!RBAC::AccessDecision()){
                //第三部：判断不通过时如何处理
                //判断session是否存放用户标记
                if(!$_SESSION[C('USER_AUTH_KEY')]){
                    //用户没有登录
                    $this->error('对不起，您没有登录，请进行登录！','__APP__/Public/login');

                }//else 用户已经登录
                //判断是否开启游客功能
                if(!C('GUEST_AUTH_ON')){
                    //开启则跳转到游客页面

                }

                $this->error('对不起，您没有操作权限！');
            }//else认证通过
        }//else没有开启认证或者当前模块不需要验证，则直接通过
    }
}