<?php
/**
 * Created by PhpStorm.
 * User: yangyp
 * Date: 2019/2/28
 * Time: 17:22
 */
class Controller{
    function router_action($action='action'){
        $request=new Request();
        $params=$request->get_params();
        var_dump($params);
//        var_dump($_SERVER['SCRIPT_URL']);
    }
}