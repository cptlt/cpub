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

        //链接的生成 component{ link toption } 内容{id}
        //index.php/$com['link']/$com['toption']/id/$内容
        /*
         *菜单项组件编号  选中内容组件时，把组件编号存入Session中
         *菜单项的所属菜单编号 点击菜单时，存入Session中
         *菜单项类型 从数据库中link字段中读取出来
         *hidden
         */
        $menuitem = new MenuItemModel();

        //select id,name,pid,path,concat(path,'-',id)as bpath from cpub_menu_item order by bpath,id
        $list = $menuitem->field("id,name,pid,path,concat(path,'-',id) as bpath")->order('bpath,id')
                ->where('menuid=1')->select();

        foreach($list as $key=>$value){
            $list[$key]['signnum'] = count(explode("-",$value['bpath'])) - 1;//path路径层数bpath需减1(用作CSS样式ID值 )
            $list[$key]['marginnum'] = (count(explode("-",$value['bpath'])) - 1) * 20  ;//偏移属性(用作缩进)
        }

        $this->assign('mlist',$list);
        $this->display();
    }

    /*
     * 菜单项添加(后台添加)
     */
    public function insert(){

        $menuitem = new MenuItemModel();

        //判断表单的一些东西是否完整

        //向后台添加
        $data = $menuitem->create();
        dump($data);
        $menuitem->add();
    }

    /*
     * 得到component内容模型以供用户创建菜单项时调用
     */
    public function component(){

        $comid = $_GET['comid'];
        $com = new Model('Component');
        if(!empty($comid)){
            $data = $com->getById($comid);
            $this->redirect($data['link'].'/helper');
        }else {

            $list = $com->where('enabled=1')->select();

            $this->assign('comlist', $list);
            $this->display();
        }
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