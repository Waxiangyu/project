<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/20
 * Time: 16:22
 */
session_start();
//判断是否提交表单

//连接数据库
$link=@mysql_connect("localhost","root","")or die("连接失败");
mysql_select_db("user");
mysql_query("set names utf8");
//获取用户名
$username=$_POST['username'];
$password=$_POST['password'];
$sql="select count(*)as 'count' from list where username='$username'and password='$password'";
//var_dump($sql);
$result=mysql_query($sql);//查找数据库中的输入的一样的用户名和密码
//var_dump($result);
$row=mysql_fetch_assoc($result);//处理结果集
//var_dump($row);
$num=(int)$row['count'];
if($num==1){

    echo "success";
    $_SESSION['username']=$username;
    echo "<script>location.href='./index.php'</script>";
}else{
     echo "failed";
    //登录失败，返回登录页面
    // echo "<script>location.href='login.html'</script>";
    echo "<script>history.back();</script>";
};
