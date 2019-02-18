<?php
/**
 * Created by PhpStorm.
 * User: yangyp
 * Date: 2019/1/9
 * Time: 11:10
 */

namespace app\index\controller\user;


class Login extends User
{
    function index($params, $request)
    {
        return $this->output_page();
    }

    function get_content(){
        return $this->fetch('user/login');
    }
    public function get_css(){
        return array_merge(
            parent::get_css(),
            array(
                'user/login'
            )
        );
    }
    public function get_static_js(){
        return array();
    }
    public function get_js(){
        return array_merge(
            parent::get_js(),
            array(
                'user/login'
            )
        );
    }
    function get_title(){
        return '登录';
    }
}