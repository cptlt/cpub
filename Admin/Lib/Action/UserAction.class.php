<?php

/**
 * 用户控制器
 */
class UserAction extends CommonAction
{

    /**
     * index操作
     */
    public function index()
    {

        //导入分页类
        $User = new UserModel();
        import('ORG.Util.Page');

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

        //数据分页
        $count = $User->where($where)->count();
        $Page = new Page($count, C('PAGE_SIZE'));
        $show = $Page->show();
        $this->assign('show', $show);

        //根据分页信息提取数据
        $userList = $User->order('id')->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->select();

        //提取用户分组信息
        //取出所有分组
        $Role = new Model('Role');
        $roleList = $Role->getField('id,name');
        //循环遍历所有用户
        foreach ($userList as &$user) {
            //获取用户所属编号
            $RoleUser = new Model('RoleUser');
            $data = $RoleUser->where('user_id=' . $user['id'])->find();
            //把分组名称提取存入用户数据
            $user['group'] = $roleList[$data['role_id']];
        }

        $this->assign('list', $userList);
        $this->display();
    }

    /*
     * 用户添加操作
     */
    public function add()
    {
        $Role = new Model('Role');
        $list = $Role->select();
        $this->assign('roleList', $list);
        $this->display();
    }

    /**
     * 用户插入操作
     */
    public function insert()
    {
        //创建用户模型
        $User = new UserModel();
        if ($data = $User->create()) {
            //表单验证成功，开始数据插入操作
            if ($User->add() !== false) {
                //获取自动增长列数据的编号
                $userId = $User->getLastInsID();

                $userRole['role_id'] = $_POST['role_id'];
                $userRole['user_id'] = $userId;
                $RoleUser = new Model('RoleUser');
                $RoleUser->add($userRole);
                $this->success('创建成功！用户编号是' . $userId, __URL__ . '/index');
            } else {
                $this->error('创建失败,' . $User->getDbError());
            }
        } else {
            //表单验证失败，获取错误信息
            $this->error('表单验证失败,失败原因：' . $User->getError());
        }
    }

    /**
     * 编辑用户信息
     */
    public function edit()
    {
        $id = $_GET['id'];
        if (!empty($id)) {
            $User = new UserModel();
            //根据用户编号进行动态查询
            $data = $User->field('id,username,name,password,email,active,role_id')->join(C('DB_PREFIX') . 'role_user on
                    id=user_id')->getById($id);
            $this->assign('data', $data);

            //获取用户数据
            $Role = new Model('Role');
            $list = $Role->select();
            $this->assign('roleList', $list);
        } else {
            $this->error('请选择编辑用户！', __URL__ . '/index');
        }
        $this->display();
    }

    /*
     * 更新用户数据
     */
    public function update()
    {

        $User = new UserModel();
        if ($data = $User->create()) {
            if (!empty($data['id'])) {
                //判断编辑时用户密码是否填写
                $oldPassword = $_POST['oldPassword'];
                $User->password = empty($User->password) ? $oldPassword : md5($User->password);

                if ($User->save() !== false) {
                    //更新role_user表
                    $ru['role_id'] = $_POST['role_id'];
                    $RoleUser = new Model('RoleUser');
                    if ($RoleUser->where('user_id=' . $data['id'])->save($ru)) {
                        $this->success('更新成功', __URL__ . '/index');
                    } else {
                        $this->error('更新失败！' . $RoleUser->getDbError());
                    }
                } else {
                    $this->error('更新失败，失败原因：' . $User->getDbError());
                }
            } else {
                $this->error('没有用户编号！');
            }
//            dump($data);
//            dump($User->password);
//            $User->password = empty($User->password) ? $oldPassword : md5($User->password);
//            dump($User->password);
//            $ru['role_id'] = $_POST['role_id'];
//            dump($ru);
        } else {
            $this->error($User->getError());
        }
    }

    /*
     * 删除用户数据
     */
    public function delete()
    {
        $deleteId = $_POST['did'];
        if (!empty($deleteId) && is_array($deleteId)) {
            //POST中删除数据的编号 array(1) array(1,2)  array(1,2,3)
            //$deleteId = array(1, 2);
            $id = implode(',', $deleteId);
            $where = 'id in(' . $id . ')';
            $User = new UserModel();

            //删除用户成功
            if ($User->where($where)->delete() !== false) {
                //删除用户角色表中的相关信息
                $RoleUser = new Model('RoleUser');
                $where = 'user_' . $where;
                $RoleUser->where($where)->delete();
                $this->success('删除成功！', __URL__ . '/index');
            } else {
                $this->error('删除用户失败，' . $User->getDbError());
            }
        } else {
            $this->error('没有选中要删除的数据！');
        }

    }
}