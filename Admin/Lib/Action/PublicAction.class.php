<?php
/**
 * Public控制器(用于输出login页面模版、进行表单验证等)
 */

class PublicAction extends Action{

    /*
     * 调用用户登录模版
     */
    public function login(){

        $this->display();
    }

    /*
    * 显示验证码
    */
    public function verify(){

        import('ORG.Util.Image');
        Image::buildImageVerify();
    }

    /*
     * 登录表单验证
     */
    public function checkLogin(){

        //检查表单数据的有效性
        if(empty($_POST['username'])){
            $this->error('用户名必须填写！');
        }
        if(empty($_POST['password'])){
            $this->error('密码必须填写！');
        }
        if(empty($_POST['verify'])){
            $this->error('验证码必须填写！');
        }

        //整理需要用户验证的数据
        $map = array();
        $map['username']=$_POST['username'];
        $map['active']=array('gt',0);
        if($_SESSION['verify'] != md5($_POST['verify'])){
            $this->error('验证码输入错误！');
        }

        //进行RBAC验证
        import('ORG.Util.RBAC');
        //提取用户数据
        $user=RBAC::authenticate($map);//dump($user)
        //判断是否能提取出用户数据
        if(empty($user)){
            $this->error('用户数据不存在或者被禁用！');
        }else{
            //判断密码是否输入正确
            //注意密码要加密后才能与数据库进行比较
            if($user['password']!=$_POST['password']){
                $this->error('用户密码输入错误！');
            }//else 密码验证成功

            //保存SESSION会话标识，用来后面判断用户已经登录的状态
            session_start();
            $_SESSION[C('USER_AUTH_KEY')]=$user['id'];
            //存储后面要用的用户数据，邮箱、登录时间
            $_SESSION['email']=$user['email'];
            $_SESSION['last_login_time']=$user['last_login_time'];

            //超级管理员身份认证
            if($user['username']=='root'){
                //该用户不受权限验证控制
                $_SESSION[C('ADMIN_AUTH_KEY')]=true;
            }

            //保存用户本次登录信息
            $u=M('User');
            $lastdate=date('Y-m-d H:i:s');
            $row['id']=$user['id'];
            $row['last_login_time']=$lastdate;
            $u->save($row);

            //缓存访问权限
            RBAC::saveAccessList();

            //登录成功跳转
            $this->success('登录成功！',__APP__.'/Index/index');
        }
    }

    /*
     * 用户登出操作
     */
    public function logout(){

        //判断用户是否正在登录
        if(!empty($_SESSION[C('USER_AUTH_KEY')])){
            //正在登录中
            unset($_SESSION[C('USER_AUTH_KEY')]);
            $_SESSION=array();
            session_destroy();
            $this->success('登出成功！',__URL__.'/login');
        }else{
            //已经退出登录
            $this->error('已经登出！');
        }
    }

}