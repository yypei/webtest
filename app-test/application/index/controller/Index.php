<?php
namespace app\index\controller;

class Index extends PublicFrame
{
    public function index($params,$request)
    {
        $data=array('cc'=>'32312323221');
        return $this->output_page($data);
    }
    function get_content(){
        return $this->fetch('index/index');
    }
    public function get_css(){
        return array_merge(
            parent::get_css(),
            array(
                'index/index'
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
                'index/index'
            )
        );
    }
    function get_title(){
        return '首页';
    }
}
