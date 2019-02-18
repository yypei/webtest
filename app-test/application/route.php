<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
//批量注册路由

//index项目路由
Route::rule([
    '/'              =>   'index/index/run',
    'goods'          =>   'index/goods/run',
    'login'          =>   'index/user.login/run',
    'register'       =>   'index/user.register/run',
    'get_img_code'   =>   'index/common.CheckCode/run',
    'aa/:*.js'       =>   'index/common.CheckCode/bb',
]);
Route::get([
]);
Route::post([
]);



//admin项目路由

Route::rule([
    'admin/index'          =>   'admin/index/index',
    'admin/login/:action'    =>   'admin/user.login/:action',
    'admin/login?action=:action'    =>   'admin/user.login/:action',
    'get_img_code'   =>   'admin/common.CheckCode/get_code',
]);
Route::get([
]);
Route::post([
]);
