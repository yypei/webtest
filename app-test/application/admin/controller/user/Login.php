<?php
/**
 * Created by PhpStorm.
 * User: yangyp
 * Date: 2019/1/14
 * Time: 16:58
 */
namespace app\admin\controller\user;
use think\Controller;
use think\Cookie;
use think\Db;

class Login extends Controller
{
    function index(){
        return $this->fetch('user/login');
    }
    function check_login($user_name='',$psd=''){
        if(!trim($user_name)){
            $this->result([],1,'请输入用户名！');
        }
        if(!trim($psd)){
            $this->result([],2,'请输入密码！');
        }
//        $aa=Db::query('select * from tb_admin_user where user_name="'.$name.'"');
        $user_info=Db::table('tb_admin_user')->where('user_name',trim($user_name))->find();
        if($user_info){
            if($user_info['password']==trim($psd)){
                Cookie::init(['prefix'=>'test_login_']);
                Cookie::set('user_name',$user_info['user_name'],3*24*60*60);
                Cookie::set('user_id',$user_info['user_id'],3*24*60*60);
                $host=\think\Request::instance()->host();
                $this->result(['url'=>'http://'.$host.'/admin/index'],'0','登录成功！');
            }else{
                $this->result([],4,'密码错误！');
            }
        }else{
            $this->result([],3,'该用户不存在！');
        }
    }
    function login_out(){
        Cookie::clear('test_login_');
        $this->result([],0,'退出成功！');
    }
    function add_user(){
        $data=[
            ['user_name'=>'name1','password'=>'111'],
            ['user_name'=>'name2','password'=>'222'],
        ];
        Db::table('tb_admin_user')->insertAll($data);
    }
    function del_user(){
        Db::table('tb_admin_user')->where('user_name','name1')->delete();
    }
    function reset_psd(){
        Db::table('tb_admin_user')->where('user_name','yangyp')->update(['password'=>'111111']);
    }
}