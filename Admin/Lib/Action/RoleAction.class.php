<?php
/**
 * 用户组控制器
 */

class RoleAction extends CommonAction{

    /*
     * index操作(列表显示用户组信息)
     */
    public function index(){

        //导入分页类
        import('ORG.Util.Page');
        $Role = new RoleModel();

        //整理用户查询
        $keyword = $_POST['keywords'];
        $findType = $_POST['type'];
        if(!empty($keyword) && !empty($findType)){
            $where[$findType] = array('like','%'.$keyword.'%');
            $_SESSION['keyword'] = $where;
        }else{
            if(empty($keyword) && !empty($findType)){
                unset($_SESSION['keyword']);
            }else{
                //不重新查询，分页显示
                $where = $_SESSION['keyword'];
            }
        }

        //数据分页
        $count = $Role->where($where)->count();
        $Page = new Page($count,C('PAGE_SIZE'));
        $show = $Page->show();
        $this->assign('show',$show);

        //根据分页信息提取数据
        $RoleList = $Role->order('id')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('RoleList',$RoleList);

        $this->display();
    }

    /*
     * add操作，添加角色
     */
    public function add(){

        $this->display();
    }

    /*
     * edit操作，编辑角色信息
     */
    public function edit(){
        $id = $_GET['id'];
        if(!empty($id)){
            $Role = new RoleModel();
            $data = $Role->getById($id);
            $this->assign("RoleData",$data);
            $this->display('add');
        }
    }

    /*
     * save操作，保存角色信息
     */
    public function save(){

        $Role = new RoleModel();
        if($data = $Role->create()){
            //创建
            if(empty($_POST['id'])){
                if($Role->add() !== false){
                    $this->success('创建成功！',__URL__.'/index');
                }else{
                    $this->error('创建失败！'.$Role->getDbError());
                }
            }else{
                //修改
                if($Role->save() !== false){
                    $this->success('修改成功！',__URL__.'/index');
                }else{
                    $this->error('修改失败！');
                }
            }
        }
    }

    /*
     * delete操作，删除角色信息
     */
    public function delete(){

        $deleteId = $_POST['did'];
        if(!empty($deleteId) && is_array($deleteId)){
            $id = implode(',',$deleteId);
            $where = 'id in('.$id.')';

            $Role = new Model('Role');
            if($Role->where($where)->delete() !== false){

                //删除权限授予表中的相关记录
                $RoleUser = new Model('RoleUser');
                $where = 'user_' . $where;
                if($RoleUser->where($where)->delete()){
                    $this->success("删除成功！",__URL__.'/index');
                }else{
                    $this->error("删除失败！".$RoleUser->getDbError());
                }
            }else{
                $this->error("删除失败！".$Role->getDbError());
            }
        }else{
            $this->error("没有选中要删除的数据！");
        }
    }
}