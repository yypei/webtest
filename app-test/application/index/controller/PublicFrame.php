<?php
/**
 * Created by PhpStorm.
 * User: yangyp
 * Date: 2018/12/28
 * Time: 10:19
 */

namespace app\index\controller;

use app\index\controller\common\View;

class PublicFrame extends View
{
//    $css css文件数组   $js  css文件数组    $constant_arr   页面变量索引数组    $t  页面title   $page_other_info数组    可以放置一些页面其他信息  例如页面头部的Description和Keywords
    public function output_page($data=array()){

        $common_css_arr=$this->get_common_css();
        $css_arr=$this->get_css();
        $request=\think\Request::instance();
        $path=$request->path();
        /*if(preg_match('/^\/$/',$path)){
            $path='/static/index.css';
        }else{
            $path='/static/'.$path.'.css';
        }*/
//        $css_path='/static/'.$path.'.css';
        $css_path=APP_PUBLIC.$path.'.css';
        foreach ($css_arr as $val){
            $val=APP_PUBLIC.'/css/'.$val.'.css';
            if(file_exists($val)){
                $css_str=file_get_contents($val);
                file_put_contents($css_path,$css_str);
            }
        }
        $static_js_arr=$this->get_static_js();
        $js_arr=$this->get_js();
        $js_arr=array_merge($static_js_arr,$js_arr);

        $page_content=$this->get_content();

        $title=$this->get_title();

        $page_variable_arr=[
            'page_content'=>$page_content,
            'css_arr'=>$common_css_arr,
            'current_page_css'=>$css_path,
            'js_arr'=>$js_arr,
            'title'=>$title
        ];
        $page_variable_arr=array_merge($page_variable_arr,$data);
        return $this->fetch('frame/PublicFrame',$page_variable_arr);
    }
    function get_content(){
        return '';
    }
    public function get_common_css(){
        return array(
            'common/bootstrap.min',
            'common/PageCommon',
        );
    }
    public function get_css(){
        return array(
            'frame/PublicFrame',
            'plug/PublicHeader',
            'plug/PublicFooter'
        );
    }
    public function get_static_js(){
        return array(
            'static/jquery-3.3.1.min',
            'common/bootstrap.min'
        );
    }
    public function get_js(){
        return array(
            'common/AllPageJsParent',
            'frame/PublicFrame',
            'plug/PublicHeader',
            'plug/PublicFooter'
        );
    }


}