<?php
/**
 * Created by PhpStorm.
 * User: yangyp
 * Date: 2019/1/9
 * Time: 15:27
 */

namespace app\index\controller\common;
use think\captcha\Captcha;

class CheckCode extends Action
{
    function get_code($params,$request){
        if(!array_key_exists('type',$params)){
            return '';
        }
        $type=$params['type'];
        $config =    [
            'fontSize'  => 30,
            'length' => 4,
            'reset'  => true
        ];
        $captcha = new Captcha($config);
        return $captcha->entry($type);
    }
    function bb(){
        echo '1111111';
    }
}