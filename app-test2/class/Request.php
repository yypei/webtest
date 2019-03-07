<?php
/**
 * Created by PhpStorm.
 * User: yangyp
 * Date: 2019/2/28
 * Time: 17:09
 */
class Request{
    function get_params(){
        $params=array();
        foreach($_GET as $key=>$val){
            $params[$key]=$val;
        }
        foreach($_POST as $key=>$val){
            $params[$key]=$val;
        }
        return $params;
    }
    function get_param($key,$default_value=''){
        $params=$this->get_params();
        if( !isset($params[$key]) || empty($params[$key]) ){
            return $default_value;
        }else{
            return $params[$key];
        }
    }
}