<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/20
 * Time: 16:22
 */
session_start();
//�ж��Ƿ��ύ��

//�������ݿ�
$link=@mysql_connect("localhost","root","")or die("����ʧ��");
mysql_select_db("user");
mysql_query("set names utf8");
//��ȡ�û���
$username=$_POST['username'];
$password=$_POST['password'];
$sql="select count(*)as 'count' from list where username='$username'and password='$password'";
//var_dump($sql);
$result=mysql_query($sql);//�������ݿ��е������һ�����û���������
//var_dump($result);
$row=mysql_fetch_assoc($result);//��������
//var_dump($row);
$num=(int)$row['count'];
if($num==1){

    echo "success";
    $_SESSION['username']=$username;
    echo "<script>location.href='./index.php'</script>";
}else{
     echo "failed";
    //��¼ʧ�ܣ����ص�¼ҳ��
    // echo "<script>location.href='login.html'</script>";
    echo "<script>history.back();</script>";
};
