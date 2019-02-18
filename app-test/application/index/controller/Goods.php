<?php
/**
 * Created by PhpStorm.
 * User: yangyp
 * Date: 2018/12/27
 * Time: 11:20
 */

namespace app\index\controller;

class Goods extends PublicFrame
{
    public function index($params,$request){
        return $this->output_page();
    }
    function get_content(){
        return $this->fetch('goods/goods');
    }
    public function get_css(){
        return array_merge(
            parent::get_css(),
            array(
                'goods/goods'
            )
        );
    }
    public function get_static_js(){
        return array_merge(
            parent::get_static_js(),
            array()
        );
    }
    public function get_js(){
        return array_merge(
            parent::get_js(),
            array(
                'goods/goods'
            )
        );
    }
    function get_title(){
        return '商品';
    }
}