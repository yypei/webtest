<?php
/**
 * Created by PhpStorm.
 * User: yangyp
 * Date: 2019/2/25
 * Time: 13:36
 */
header('Content-Type: text/html; charset=utf-8');

class Test{
    function index(){
        if(array_key_exists('action',$_REQUEST)){
            $action=$_REQUEST['action'];
            if(method_exists($this,$action)){
                echo json_encode($this->$action());
            }
        }else{
            require_once '../view/test.html';
        }
        return;
    }
    function init_page(){
        return $this->select_info('test_one');
    }
    function test_fn(){
        $content=$_REQUEST['content'];
        if(mb_strlen(trim($content),'UTF8')>0){
            return $this->insert_info('test_one',array('message'=>$content));
        }else{
            return $this->error('内容不能为空！');
        }
    }
    function del_info(){
        $id=$_REQUEST['id'];
        return $this->delete_info('test_one',$id);
    }
    function clean_or_del_table(){
        $type=$_REQUEST['type'];
        return $this->delete_info('test_one','',$type);
    }
    function modify_message(){
        $k_info=(int)$_REQUEST['k_info'];
        $m_info=$_REQUEST['m_info'];
        return $this->modify_info('test_one','id',$k_info,'message',$m_info);
    }




    function success($message='',$status=0,$data=[]){
        return array('data'=>$data,'status'=>$status,'message'=>$message);
    }
    function error($message='',$status=1,$data=[]){
        return array('data'=>$data,'status'=>$status,'message'=>$message);
    }






    function connect_sql(){
        $dbhost='127.0.0.1:3306';
        $dbuser='root';
        $dbpass='123456';
        return mysqli_connect($dbhost,$dbuser,$dbpass);
    }

    function insert_info($table_name,$info=array()){
        $conn=$this->connect_sql();
        if(!$conn){
//            die('Could not connect: ' . mysqli_error());
            return $this->error('链接数据库失败',888);
        }else if(count($info)>0 && !empty($table_name)){
            $sql="insert into ".$table_name." (";
            $data_key='';
            $data_val='';
            foreach ($info as $key=>$val){
                $data_key.=$key.',';
                $data_val.="'".$val."'".',';
            }
            $data_key=mb_substr($data_key,0,mb_strlen($data_key)-1,'utf8');
            $data_val=mb_substr($data_val,0,mb_strlen($data_val)-1,'utf8');
            $sql.=$data_key.") values (".$data_val.")";
            mysqli_query($conn,"set name utf8");
            mysqli_select_db($conn,'yyp');
            $retval=mysqli_query($conn,$sql);
            if(!$retval){
//                die('Could not connect: ' . mysqli_error($conn));
                return $this->error('无法插入数据',777);
            }else{
                return $this->success('数据插入成功');
            }
        }else{
            return $this->error('数据格式有误',999);
        }
        mysqli_close($conn);
    }

    function delete_info($table_name,$info,$type=false){//$bool为1清除表内信息 为2删除表结构
        $conn=$this->connect_sql();
        if(!$conn){
//            die('Could not connect: ' . mysqli_error());
            return $this->error('链接数据库失败',888);
        }else if( !empty($table_name)){
            if($info){
                $sql="delete from ".$table_name." where id=".$info;
            }else{
                if($type){
                    if($type==='1'){
                        $sql="truncate table ".$table_name;
                    }else if($type==='2'){
                        $sql="drop table ".$table_name;
                    }
                }else{
                    return $this->error('参数缺失',666);
                }
            }
            mysqli_query($conn,"set name utf8");
            mysqli_select_db($conn,'yyp');
            $retval=mysqli_query($conn,$sql);
            if(!$retval){
//                die('Could not connect: ' . mysqli_error($conn));
                return $this->error('无法删除数据',777);
            }else{
                return $this->success('删除数据成功');
            }
        }else{
            return $this->error('参数缺失',999);
        }
        mysqli_close($conn);
    }

    function select_info($table_name,$info=array()){
        $conn=$this->connect_sql();
        if(!$conn){
//            die('Could not connect: ' . mysqli_error());
            return $this->error('链接数据库失败',888);
        }else if( !empty($table_name)){
            if(count($info)>0){
                $sql="select ";
                foreach ($info as $val){
                    $sql.=$val.",";
                }
                $sql=mb_substr($sql,0,mb_strlen($sql)-1,'utf8');
                $sql.=" from ".$table_name;
            }else{
                $sql="select * from ".$table_name;
            }
            mysqli_query($conn,"set name utf8");
            mysqli_select_db($conn,'yyp');
            $retval=mysqli_query($conn,$sql);
            if(!$retval){
//                die('Could not connect: ' . mysqli_error($conn));
                return $this->error('无法读取数据',777);
            }else{
                $data_list=[];
                while($data=mysqli_fetch_array($retval,MYSQLI_ASSOC)){
                    $data_list[]=$data;
                };
                return $this->success('获取数据成功',0,$data_list);
            }
        }else{
            return $this->error('数据格式有误',999);
        }
        mysqli_close($conn);
    }

    function modify_info($table_name,$key,$k_info,$m_key,$m_info)
    {
        $conn = $this->connect_sql();
        if (!$conn) {
            return $this->error('连接数据库失败', 888);
        } else if ($table_name && $key && $k_info && $m_key && $m_info ) {
            $sql="update ".$table_name." set ".$m_key."='".$m_info."' where ".$key."=".$k_info;
            mysqli_query($conn,"set name utf8");
            mysqli_select_db($conn,"yyp");
            $retval=mysqli_query($conn,$sql);
            if(!$retval){
                die('Could not connect: ' . mysqli_error($conn));
                return $this->error('无法修改数据', 555);
            }else{
                return $this->success('数据修改成功');
            }
        } else {
            return $this->error('参数缺失', 999);
        }
    }

}
$t=new Test();
$t->index();
