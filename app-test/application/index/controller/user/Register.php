<?php
/**
 * Created by PhpStorm.
 * User: yangyp
 * Date: 2019/1/9
 * Time: 11:10
 */

namespace app\index\controller\user;
use app\index\controller\common\Check;
use think\captcha\Captcha;

class Register extends User
{
    function index($params, $request)
    {
        return $this->output_page();
    }
    function check_img_code($params,$request){
        $img_code=$params['img_code'];
        $type=$params['type'];
        if($img_code && $type){
            $captcha = new Captcha();
            if($captcha->check($img_code, $type)){
                $this->result([],1,'图片验证码正确！');
            }else{
                $this->result([],2,'图片验证码错误！');
            }
        }else{
            $this->result([],3,'参数缺失！');
        }
    }

    function check_phone_code($params,$request){
        if(!isset($params['phone_code'])){
            $this->result([],4,'参数缺失！');
        }
        $phone_code=$params['phone_code'];
        if($phone_code!='8888'){
            $this->result([],5,'手机验证码错误！');
        }
        $this->result([],0,'请求成功！');
    }


    function check_register($params,$request){
        if(!isset($params['phone']) || !isset($params['phone_code']) || !isset($params['password'])){
            $this->result([],6,'参数缺失！');
        }
        $phone=$params['phone'];
        $phone_code=$params['phone_code'];
        $password=$params['password'];
        if(Check::check_phone($phone)){
            echo '111';
        }else{
            echo '222';
        }
    }



    function get_content(){
        return $this->fetch('user/register');
    }
    public function get_css(){
        return array_merge(
            parent::get_css(),
            array(
                'user/register'
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
                'user/register'
            )
        );
    }
    function get_title(){
        return '注册';
    }
}