<?php
/**
 * Created by PhpStorm.
 * User: yangyp
 * Date: 2019/1/9
 * Time: 20:09
 */

namespace app\index\controller\common;

use think\Controller;

class Action extends Controller
{
    function run(){
        $request=\think\Request::instance();
        $params=$request->param();
        if( array_key_exists('action',$params)){
            $action_name=$params['action'];
            return $this->$action_name($params,$request);
        }else{
            return $this->index($params,$request);
        }
    }
    function index($params,$request){

    }
}