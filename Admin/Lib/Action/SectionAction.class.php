<?php
/**
 * 单元控制器
 */

class SectionAction extends CommonAction{

    /*
     * index操作，单元的列表显示
     */
    function index(){

        import('ORG.Util.Page');
        $sec = new SectionModel();

        //整理用户查询
        $keyword = $_POST['keywords'];
        $findType = $_POST['type'];
        if (!empty($keyword) && !empty($findType)) {
            $where[$findType] = array('like', '%' . $keyword . '%');
            $_SESSION['keyword'] = $where;
        } else {
            //是否重新查询
            //重新查询
            if (empty($keyword) && !empty($findType)) {
                unset($_SESSION['keyword']);
            } else {
                //不重新查询，而是分页显示
                $where = $_SESSION['keyword'];
            }
        }

        $list = $sec->relation(true)->where($where)->select(); //->find(1)是查询单位编号为1的单元的相关内容
        $this->assign('sectionList',$list);
        $this->display();
    }

    /*
     * add操作，添加单元
     */
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

//创建数据(通过该操作可以批量生成数据)
/*$data['title'] = '自定义单元1';
$data['categorys'] = array(
    array('title'=>'自定义分类1','alias'=>'test1'),
    array('title'=>'自定义分类2'),
);*/
//        $sec->relation(true)->add($data);
//
//        //更新数据
//        $sec->relation(true)->where('id=1')->save($data);
//
//        //删除数据
//        $sec->relation(true)->delete(5);
//
//        $this->display();