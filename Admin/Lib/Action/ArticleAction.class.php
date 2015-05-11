<?php
/**
 * Article文章控制器
 */

class ArticleAction extends CommonAction {

    /*
     * 文章的列表显示
     */
    public function index(){

        //导入分页类
        import('ORG.Util.Page');
        $Article = new ArticleViewModel();

        //整理用户查询
        $keyword = $_POST['keywords'];
        $findType = $_POST['type'];
        if(!empty($keyword) && !empty($findType)){
            $where[$findType] = array('like','%' . $keyword . '%');
            //存储查询关键词
            $_SESSION['keyword'] = $where ;
        }else{
            //是否重新查询
            //重新查询
            if(empty($keyword) && !empty($findType)){
                unset($_SESSION['keyword']);
            }else{
                //不重新查询，分页进行显示
                $where = $_SESSION['keyword'];
            }
        }

        //数据分页
        $count = $Article->where($where)->count();
        $Page = new Page($count,C('PAGE_SIZE'));
        $show = $Page->show();
        $this->assign('page',$show);

        //根据分页信息提取数据
        $ArticleList = $Article->where($where)->order('Article.id')->limit($Page->firstRow.','.$Page->listRows)
            ->select();
        $this->assign('list',$ArticleList);

        //显示模版
        $this->display();
    }

    /*
     * add操作，新建文章
     */
    public function add(){

        //单元信息数据，供新建文章选择分类时使用
        $Sec = new Model('Section');
        $SectionList = $Sec->select();
        $this->assign('section',$SectionList);

        //分类信息数据，供新建文章选择单元时使用
        $Cat = new Model('Category');
        $CategoryList = $Cat->select();
        $this->assign('category',$CategoryList);

        $this->display();
    }

    /*
     * insert操作，保存新建的文章到数据库中
     */
    public function insert(){

        $Article = new ArticleModel();
        if($data = $Article->create() ){
            //表单验证成功开始插入数据
            if($Article->add() !== false){
                $this->success("文章已保存！".$Article->getLastInsID(),__URL__.'/index');
            }else{
                $this->error("文章创建错误，错误原因：".$Article->getDbError());
            }
        }else{
            $this->error("数据验证失败！");
        }
    }

    /*
     * edit操作，编辑修改文章
     */
    public function edit(){

        //接受传递过来的文章id
        $id = $_GET['id'];
        if(!empty($id)){
            $Article = new ArticleModel();
            //动态查询
            $data = $Article->field('id,title,alias,title_alias,introtext,published,sectionid,catid')->getById($id);
            $this->assign('data',$data);

            //单元信息数据，供修改文章选择分类时使用
            $Sec = new Model('Section');
            $SectionList = $Sec->select();
            $this->assign('section',$SectionList);

            //分类信息数据，供修改文章选择单元时使用
            $Cat = new Model('Category');
            $CategoryList = $Cat->select();
            $this->assign('category',$CategoryList);
        }else{
            $this->error("没有文章被选中可被编辑！");
        }

        $this->display();
    }

    /*
     * update操作，更新对文章的修改到数据库中
     */
    public function update(){

        $Article = new ArticleModel();
        if($data = $Article->create()){
            if(!empty($_POST['id'])){
                //判断是否填写单元和分类
                if(!empty($_POST['sectionid'])&&!empty($_POST['catid'])){

                    if($Article->save() !== false){
                        $this->success("更新成功！",__URL__.'/index');
                    }else{
                        $this->error('文章更新失败,'.$Article->getDbError());
                    }
                }else{
                    $this->error("文章的所属单元和分类必须填写！");
                }
            }else{
                $this->error('文章更新失败！');
            }
        }else{
            $this->error($Article->getError());
        }
    }

    /*
     * delete操作，删除所选文章
     */
    public function delete(){
        $deleteId = $_POST['did'];
        if (!empty($deleteId) && is_array($deleteId)) {
            //POST中删除数据的编号 array(1) array(1,2)  array(1,2,3)
            //$deleteId = array(1, 2);
            $id = implode(',', $deleteId);
            $where = 'id in(' . $id . ')';
            $Article = new ArticleModel();

            //删除用户成功
            if ($Article->where($where)->delete() !== false) {
                $this->success('删除成功！', __URL__ . '/index');
            } else {
                $this->error('删除用户失败，' . $Article->getDbError());
            }
        } else {
            $this->error('没有选中要删除的数据！');
        }
    }

    /*
     * helper帮助文档
     */
    public function helper(){

        $this->display();
    }
}