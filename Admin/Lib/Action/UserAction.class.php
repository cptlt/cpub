<?php
/**
 * 用户控制器
 * User: Inen
 * Date: 2015/4/3
 * Time: 10:11
 */

class UserAction extends CommonAction{

    /**
     * index()方法
     */
    public function index(){

        //创建用户模型
        $user = new UserModel();

        //接受表单的查询方式
        $keywords = $_POST['keywords'];
        $type = $_POST['type'];
        //判断表单是否为空
        if(!empty($keywords) && !empty($type)){
            //查询数据(模糊查询)
            $where=$type." like '%".$keywords."%'";
//            $id = $type." = ".$keywords;
//            $where[$type] = $keywords;
//            $where['id'] = array(array('gt',0),array('lt',10));
        }else{

        }
//        echo $where;
//        $list = $user->where($where)->select();
//        $data = $user->find();
//        $data = $user->where($where)->find(); //只取一条数据
//        $data = $user->getField('id,username,name,active');

        //组合查询
/*        $where['id'] = array('gt',1);
        $where['name'] = array('like','%jax%');*/

        //复合查询
//        $where['username'] = array('like','%jax%');
//        $where['_login'] = 'or';
//        $where['id'] = array('gt',1);
//        $map['_complex'] = $where;
//        $map['active'] = 1;
        //active=1 and (username like '%jax%' or id>1)
//        $data = $user->where($where)->select();
//        dump($data);

        //统计查询 count() avg() sum()...

        //定位查询 getN() first() last()

        //SQL查询 query() execute()

        //动态查询 getBy
//        //$data = $user->getById();
//        $data = $user->getByUsername('jax');
//        dump($data);
//        $user->top5();
//        $this->assign('ulist',$list);

/*        //总结
        $user->select();
        $user->find();
        $user->getField();
        $user->where('id=1')->select();
        $where['id'] = 1;
        $where['username'] = array('like','%jax%');
        $user->where($where)->select();
        $user->count();$user->max();
        $user->query('select * from xxx');
        $user->execute('insert update delete');
        $user->getById(1);$user->getByEmail('...');

        $user->data(array())->add();
        $user->field('id,username,name as uname')->select();
        $user->order('id desc')->select();
        $user->order('id')->limit(5)->select();
        $user->page('1,10')->select();
        $user->group('active')->select();
        $user->having('active=1')->select();

        //表连接查询(左连接 右连接 内链接)
        $user->join('A on user.id=A.id')->select();
        $user->join('inner join A on user.id=A.id')->select();
        $user->join('right join A on user.id=A.id')->select();
        $user->lock(true)->select();*/

        $list = $user->where($where)->select();
        $this->assign('ulist',$list);
        $this->display();
    }

    public function add(){

        $this->display();
    }

    /**
     * insert()插入数据方法
     */
    public function insert(){
        //创建用户模型
        $user = new UserModel();
        if($data = $user->create()){
            //表单验证成功，开始数据插入操作
            if($user->add() !== false){
                //获取自动增长列数据的编号
                $userid = $user->getLastInsID();
                echo '创建成功！用户编号是'.$userid;
            }else{
                echo '创建失败,'.$user->getDbError();
            }
        }else{
            //表单验证失败，获取错误信息
            echo '创建失败！';
            echo $user->getError();
        }
        /*dump($data);
        echo $user->getError();*/
    }

    /**
     * 编辑用户信息
     */
    public function edit(){

        $id = $_GET['id'];
        if(!empty($id)){
            $user = new UserModel();
            $data = $user->getById($id);    //根据用户编号进行动态查询
            $this->assign('data',$data);
        }else{
            echo '请选择编辑用户！';
            return;
        }
        $this->display();
    }


    public function update(){

        $user = new UserModel();
        if($data = $user->create()){
            if(!empty($data['id'])){
                if($user->save() !== false){
                    echo '更新成功！';
                }else{
                    echo '更新失败！'.$user->getDbError();

                }
            }else{
                echo '没有更新用户的编号！';
            }
        }else{
            echo $user->getError();
        }
    }

    public function delete(){

        $deleteid = $_POST['deleteid'];
        //POST中删除数据的编号 array(1) array(1,2)  array(1,2,3)
        $deleteid = array(1,2);
        $id = implode(',',$deleteid);
        $where = 'id in('.$id.')';
        $user = new UserModel();

        if($user->where($where)->delete() !== false){
            echo '删除用户成功！';
        }else{
            echo '删除用户失败！'.$user->getDbError();
        }

    }
}