<?php
/**
 * 菜单项控制器
 * 用于在index中列表显示菜单，add中添加菜单(在insert中添加，add只是显示)
 * User: Inen
 * Date: 2015/4/10
 * Time: 17:40
 */

class MenuItemAction extends CommonAction {

    /*
     * 菜单列表显示
     */
    public function index(){

    }

    /*
     * 菜单项添加
     */
    public function add(){

        //select id,name,pid,path,concat(path,'-',id)as bpath from cpub_menu_item order by bpath,id
        $menuitem = new MenuItemModel();
        $list = $menuitem->field("id,name,pid,path,concat(path,'-',id) as bpath")->order('bpath,id')
                ->where('menuid=1')->select();
        dump($list);

        foreach($list as $key=>$value){
            $list[$key][''] = ;
            $list[$key]['marginnum'] = ;
        }
        $this->assign($list);
        $this->display();
    }

    /*
     * 菜单项添加(后台添加)
     */
    public function insert(){

    }

    /*
     * 菜单项编辑
     */
    public function edit(){

    }

    /*
     * 菜单项编辑(后台更新)
     */
    public function update(){

    }

    /*
     * 菜单项删除
     */
    public function delete(){

    }
}