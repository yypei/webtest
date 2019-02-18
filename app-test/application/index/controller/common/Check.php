<?php
/**
 * Created by PhpStorm.
 * User: yangyp
 * Date: 2019/1/11
 * Time: 10:35
 */

namespace app\index\controller\common;


class Check
{
    /**
     * 邮箱验证
     * @param string $email 要校验的参数
     * @return bool
     */
    public static function check_email($email=''){
        $preg_email='/^[a-zA-Z0-9]+([-_.][a-zA-Z0-9]+)*@([a-zA-Z0-9]+[-.])+([a-z]{2,5})$/ims';
        return preg_match($preg_email,$email);
    }


    /**
     * 验证手机号
     * @param string $phone 要校验的参数
     * @return bool
     */
    public static function check_phone($phone=''){
        $preg_phone='/^1[34578]\d{9}$/ims';
        return preg_match($preg_phone,$phone);
    }


    /**
     * 验证固定号码
     * @param string $call 要校验的参数
     * @return bool
     */
    public static function check_call($call=''){
        $preg_call='/^(0\d{2,3})?(\d{7,8})$/ims';
        return preg_match($preg_call,$call);
    }


    /**
     * 验证只包含中英文的名字
     * @param string $name 要校验的参数
     * @return bool
     */
    public static function check_name($name=''){
        $preg_name='/^[\x{4e00}-\x{9fa5}]{2,10}$|^[a-zA-Z\s]*[a-zA-Z\s]{2,20}$/isu';
        return preg_match($preg_name,$name);
    }


    /**
     * 验证身份证号码
     * @param string $id_card 要校验的参数
     * @return bool
     */
    public static function check_card($id_card=''){
        $preg_card='/^\d{15}$)|(^\d{17}([0-9]|X)$/isu';
        return preg_match($preg_card,$id_card);
    }


    /**
     * 验证银行卡号
     * @param string $bankcard 要校验的参数
     * @return bool
     */
    public static function check_bankcard($bankcard=''){
        $preg_bankcard='/^(\d{15}|\d{16}|\d{19})$/isu';
        return preg_match($preg_bankcard,$bankcard);
    }


    /**
     * 验证QQ号码
     * @param string $qq 要校验的参数
     * @return bool
     */
    public static function check_qq($qq){
        $preg_qq='/^\d{5,12}$/isu';
        return preg_match($preg_qq,$qq);
    }


    /**
     * 验证微信号
     * @param string $wechat 要校验的参数
     * @return bool
     */
    public static function check_wechat($wechat){
        $preg_wechat='/^[_a-zA-Z0-9]{5,19}+$/isu';
        return preg_match($preg_wechat,$wechat);
    }

}