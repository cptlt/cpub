<?php
/**
 * 单元控制器
 * User: Inen
 * Date: 2015/4/9
 * Time: 14:42
 */

class SectionAction extends CommonAction{

    /*
     *
     */
    function index(){

        $sec = new SectionModel();
        $list = $sec->relation(true)->select(); //->find(1)是查询单位编号为1的单元的相关内容
        //dump($list);

        //创建数据(通过该操作可以批量生成数据)
        $data['title'] = '自定义单元1';
        $data['categorys'] = array(
            array('title'=>'自定义分类1','alias'=>'test1'),
            array('title'=>'自定义分类2'),
        );
        $sec->relation(true)->add($data);

        //更新数据
        $sec->relation(true)->where('id=1')->save($data);

        //删除数据
        $sec->relation(true)->delete(5);

    }

    function add(){

        $this->display();
    }

    function edit(){

    }

    function delete(){

    }

    function insert(){
        dump($_POST);
    }

    function update(){

    }

    /*
     * 提取单元中的所有数据信息供用户选择
     */
    public function helper(){

        echo '提取单元中的所有数据信息供用户选择,进行菜单项的创建！';

        $sec = new SectionModel();
        $list = $sec->select();

        echo '<a href="__APP__/MenuItem/add">下一步</a>';
    }
}