<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
define('APP_PUBLIC', __DIR__);

define('APP_DEBUG',TRUE);
define('DB_FIELD_CACHE',false);
define('HTML_CACHE_ON',false);

// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';

/*\think\Build::module('admin',array(
    '__file__'   => ['common.php'],
    '__dir__'    => ['behavior', 'controller', 'model', 'view'],
    'controller' => ['Index', 'Test', 'UserType'],
    'model'      => ['User', 'UserType'],
    'view'       => ['index/index'],
));*/
