<?php
/**
 * Created by PhpStorm.
 * User: yangyp
 * Date: 2019/1/8
 * Time: 15:57
 */

namespace app\index\controller\common;


abstract class View extends Action
{
    abstract public function get_content();

    public static function get_css_list() {
        return array();
    }
    public static function get_js_list() {
        return array();
    }

    public static function get_static_js_list() {
        return array();
    }
    public function get_title() {
        return '测试';
    }
    public function get_keywords() {
        //return 'PHP,Frame,框架，好用';
    }

    public function get_description() {
        //return '世界上最好用的php框架';
    }
    public function get_metals(){
        //return [['name'=>'hah','haha','hehe'],['name'=>'hah','haha','hehe']]
    }
}