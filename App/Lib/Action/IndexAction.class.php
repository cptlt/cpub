<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){

        header("Content-Type:text/html;charset=utf-8");

        $this->assign('title','帕博-首页');

        $this->display();

    }
}