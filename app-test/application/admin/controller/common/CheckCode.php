<?php
/**
 * Created by PhpStorm.
 * User: yangyp
 * Date: 2019/1/9
 * Time: 15:27
 */

namespace app\admin\controller\common;
use think\captcha\Captcha;

class CheckCode
{
    function get_code($type=''){
        if(!$type){
            return '';
        }
        $config =    [
            'fontSize'  => 30,
            'length' => 4,
            'reset'  => true
        ];
        $captcha = new Captcha($config);
        return $captcha->entry($type);
    }
}