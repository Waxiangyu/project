<?php
@$link=mysql_connect('localhost','root','') or die("连接失败");//连接数据库，服务器，用户名，密码
mysql_select_db('shop');//查看数据库day10,
mysql_query('set names utf8');//设置字符集

$sql="select * from products";//找到products表的所有内容
$result=mysql_query($sql);//把数组集传给$result，mysql_query()解析字符集
$products=array();
while($row=mysql_fetch_assoc($result)){//mysql_fetch_assoc返回关联数组，如果找不到或错误就返回false
    $key=(int)$row['id'];//数组集的id转成Int类型传给$key
    unset($row['id']);//去掉里面的id，102.103之类的
    $products[$key]=$row;//$products的第一个取出来就是$row的第一个，相当于给$row的内容又加了新的索引
}
// var_dump($result);
//var_dump($key);