<?php
@$link=mysql_connect('localhost','root','') or die("����ʧ��");//�������ݿ⣬���������û���������
mysql_select_db('shop');//�鿴���ݿ�day10,
mysql_query('set names utf8');//�����ַ���

$sql="select * from products";//�ҵ�products�����������
$result=mysql_query($sql);//�����鼯����$result��mysql_query()�����ַ���
$products=array();
while($row=mysql_fetch_assoc($result)){//mysql_fetch_assoc���ع������飬����Ҳ��������ͷ���false
    $key=(int)$row['id'];//���鼯��idת��Int���ʹ���$key
    unset($row['id']);//ȥ�������id��102.103֮���
    $products[$key]=$row;//$products�ĵ�һ��ȡ��������$row�ĵ�һ�����൱�ڸ�$row�������ּ����µ�����
}
// var_dump($result);
//var_dump($key);