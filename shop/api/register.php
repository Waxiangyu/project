<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/15
 * Time: 18:54
 */
session_start();
//连接数据库
$link=@mysql_connect("localhost","root","")or die("连接失败");
mysql_select_db("user");
mysql_query("set names utf8");
//获取用户名
$username=$_POST['username'];//获取用户名和密码

if($_GET['action']=='user'){
    //var_dump($username);
    $sql="select count(*)as 'count' from list where username='$username'";
    $result=mysql_query($sql);
    $row=mysql_fetch_assoc($result);//处理结果集
//var_dump($row);
    $num=(int)$row['count'];
    if($num==1){
        //数据库有此用户名，不可用
        echo "no";
    }else{
        echo "ok";
    }
}else{
    $password=$_POST['password'];
    $sex=$_POST['sex'];
    $age=$_POST['age']?$_POST['age']:'';
//var_dump($username);
//    var_dump($password);
//    var_dump($sex);
//    var_dump($age);
//    exit;
    $sql="insert into list values('','$username','$password','$sex','$age')";
    //var_dump($spl);
    $result=mysql_query($sql);

    $num=mysql_affected_rows($link);
    if($num==1){
        echo "success";
    }else{
        echo "failed";
        $_SESSION['user']=array(
            "username"=>$username,
            "password"=>$password,
            "sex"=>$sex,
            "age"=>$age
        );
    }

}
