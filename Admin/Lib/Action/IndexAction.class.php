<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
    public function index(){
        $nowUser = C('USER_AUTH_KEY');
        $this->assign('user',$nowUser);
        $this->display();
    }
}