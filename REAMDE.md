###CMS用户管理

     1.模型定义
        $user = new Model('');////表名，表前缀，数据库连接信息
    
     2.字段映射：
    
     3.自动完成：
        protected $_auto = array(
            array('status',1),//新增的时候把字段status设置为1
            //对password字段在新增的时候使用md5方法加密
            array('password','md5',1,'function'),
            //对name字段在新增的时候回调getName方法
            array('name','getName',1,'callback'),
            //对create_time字段在更新的时候写入当前时间
            array('create_time','time',2,'function'),
        );
    
     4.CURD操作：
        ThinkPHP提供了灵活和方便的数据库操作方法，对数据库的基本操作（CURD）的实现是最基本的，在这基础上有更多的数据操作方法.
         1、 创建数据：
            - 第一种方法：$模型->add($data);          //$data是一个数组
            - 第二种方法：$模型->data($data)->add();  //连贯操作，因为TP每个函数都会返回一个对象
            - 第三种方法：$模型->create();            //create方法会进行数据的有效性验证(即会用到我们定义的数据验证)
                   $模型->add();
         2、 读取数据：
            1.读取全部数据
                $模型->select();
                $模型->findAll();
            2.读取一条记录：
                $模型->find();
        3.读取某个字段的值：
            $模型->getField(); //当只有一个字段的时候，始终返回一个值，如果传入多个字段可以返回一个关联数组
    
    5.查询语言：
    普通查询
        1.使用数组作为查询条件
        $User = M('User'); //实例化User对象
        $condition['name'] = 'thinkphp';
        $User->where($condition)->select();//将查询条件传入到查询方法
    区间查询
        2.$where['id'] = array(array('gt',0),array('lt',10));
    组合查询
        3.$where['id'] = array('gt',1);
          $where['name'] = array('like','%jax%');
    复合查询
        4.$where['username'] = array('like','%ajax%');
          $where['id'] = array('gt',1);
          $where['_logic'] = 'or';
          $map['_complex'] = $where;
          $map['active'] = 1;
          //(active = 1 and (username like '%jax%' or id > 1))
    统计查询
        5.max min avg sum
    定位查询
        6.使用getN()方法直接查询结果中的某个位置的记录
        $user->where('score>0')->order('score desc')->getN(2);//获取符合条件的第3条记录
        first()\last()方法获取第一条和最后一条记录
    SQL查询
        7.query()方法用于sql查询操作，和select()方法一样返回数据集
            $user->query("SELECT * FROM cpub_user where active = 1");
        8.execute()方法用于更新和写入数据的sql操作，返回受影响的记录数
            $user->execute($sql);
    动态查询
        9.动态查询针对数据表的字段进行查询。例如User对象拥有id,name,email,address等属性，那么我们就可以使用下面的查询方法来直接根据
          某个属性来查询符合条件的记录。
          $user = $User->getByName('admin');
          $user = $User->getByEmail('admin@qq.com');
          暂时不支持多数据字段的动态查询方法，请使用find方法和select方法进行查询。
    top动态查询
        10.$User-> where('score>80')->order('score desc')->top5();
           $User-> where('score>80')->order('score desc')->top8();
    子查询
        11.使用select()方法
           //首先构造子查询SQL
           $subQuery = $model->field('id,name')->table('tablename')->group('field')->where($where)->order('status')->
                        select(false);
        12.使用buildSql方法
           // 利用子查询进行查询
           $subQuery = $model->field('id,name')->table('tablename')->group('field')->where($where)->order('status')->
                        buildSql();
           调用buildSql方法后不会进行实际的查询操作，而只是生成该次查询的SQL语句（为了避免混淆，会在SQL两边加上括号），然后我们直接
           在后续的查询中直接调用。
           $model->table($subQuery.' a')->where()->order()->select();
           
    6.更新数据
        1、第一种方法:$模型->where('id=1')->save($data);
        2、第二种方法:$模型->where('id=1')->data($data)->save();
        3、第三种方法：$模型->create();
                     $模型->save();
                     (这种方法的表单中必须包含一个以主键为名称的隐藏域)
        4、第四种方法：$模型->where('id=5')->setField('name','ThinkPHP');
                     $模型->where('id=5')->setField(array('name','email'),array('TP','TP@163.com'));
        5、第五种方法：$模型->setInc('score','id=5',3);  //积分加3
                     $模型->setInc('score','id=5');    //积分加1
                     $模型->setDec('score','id=5',5);  //积分减5
                     $模型->setDec('score','id=5');    //积分减1

###CMS内容组件
- 1.视图模型
        'Blog'=>array('id','name','title')
        '_as'=>'myBlog'                         //给表名加别名
        'title'=>'category_name'                //字段别名
        '_on'=>'Blog.category_id=Category.id'   //关联
        '_type'=>'LEFT'                         //表连接的方式(左连接 右连接 内链接，默认为join左连接)
        
- 2.关联模型
    - 2.1 一对一关联 ONE_TO_ONE,包括HAS_ONE和BELONGS_TO
    - 2.2 一对多关联 ONE_TO_MANY,包括HAS_MANY和BELONGS_TO
    - 2.3 多对过关联 MANY_TO_MANY
    - 2.4 关联关系必然有一个参照表，例如：
        - 2.4.1 用户表、用户分组表、用户收获地址表、商品表、订单表等
        - 2.4.2 每个用户都有对应的用户资料档案，所以属于HAS_ONE关联
        - 2.4.3 每个用户都属于某个用户组，所以属于BELONGS_TO关联
        - 2.4.5 每个用户都可以发表多篇文章，但某个文章只属于一个用户，因此属于HAS_MANY关联
        - 2.4.6 每个模块可以属于多个菜单项，一个菜单项内可以包含多个模块，因此属于MANY_TO_MANY关联
    - 2.5 一个模型根据业务模型的复杂程度可以定义多个关联，不收限制，所有的关联定义都统一在模型类的$_link成员变量里面定义，并且可以支
        持动态定义。要支持关联操作，模型类必须继承RelationModel类，关联格式的定义是：
         protected $_link = array(
            '关联1' => array(
                '关联属性1'=>'定义'，
                '关联属性2'=>'定义'，
            ),
            '关联2' => array(
                '关联属性1'=>'定义'，
                '关联属性N'=>'定义'，
            )，
            ...
            );

    - 2.6 通过关联模型批量生成数据
        $sec = new SectionModel();
        //创建数据
        $data['title'] = '自定义单元1';
        $data['categorys'] = array(
            array('title'=>'自定义分类1','alias'=>'test1'),
            array('title'=>'自定义分类2'),
        );
        $sec->relation(true)->add($data);

###CMS菜单管理--内容模型与无限级菜单
    
- 菜单与菜单项的创建
- CMS的内容模型
    - 内容模型指的是可以自定义不同形式的内容，例如：文章、图片、商品、软件下载、分类信息、专题等。
    - 通过站点不同的内容模型构建不同内容形式的站点，例如：使用图片模型可以做一个图片站，用商品模型可以构建一个电子商城等。
- 无限分级的菜单
    - 实现
        - 递归调用
        - SQL查询排序

