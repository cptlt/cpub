<?php
/**
 * 最新文章widget
 */

class LatestNewsWidget extends Widget{

    /*
     * 渲染方法
     */
    public function render($data){

        $params = $data['params'];
        $newParams = explode("\n",$params);

        $np = array();
        foreach($newParams as $v){
            $tmp = explode("=",$v);
            $np[$tmp[0]] = $tmp[1];
        }

        $article = new Model('Article');
        $list = $article->where("sectionid=".$np['sid'].' and catid='.$np['cid'])->select();

        $data['articleList'] = $list;

        //获取模版文件
        $content = $this->renderFile($np['style'], $data);
        return $content;
    }
}