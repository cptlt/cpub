<?php
/**
 * 模块控制器(调用模块用于在前台根据需要显示)
 */

class ModulesAction extends Action{

    /*
     * index()方法
     */
    public function index(){

        $mod = new Model('Modules');
        $list = $mod->where("position='left'")->select();

        $this->assign('modList',$list);
        $this->display();
    }

}