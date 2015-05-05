<?php

/**
 * 菜单Widget
 */
class MenuWidget extends Widget
{

    /*
     * 渲染方法 接受一个数据，该数据会被扩展到模版上
     */
    public function render($data)
    {

        $params = $data['params'];
        $newParams = explode("\n",$params);

        $np = array();
        foreach($newParams as $v){
            $tmp = explode("=",$v);
            $np[$tmp[0]] = $tmp[1];
        }

        $menuitem = new Model('MenuItem');
        $list = $menuitem->field("id,name,link,concat(path,'-',id) as bpath")->order('bpath,id')
                ->where('menuid='.$np['id'])->select();

        foreach($list as $key=>$value){
            $list[$key]['signnum'] = count(explode("-",$value['bpath'])) - 1;
            $list[$key]['marginnum'] = (count(explode("-",$value['bpath'])) - 1) * 20;
        }
        $data['mlist'] = $list;


        //获取模版文件
        $content = $this->renderFile($np['style'], $data);
        return $content;
    }
}