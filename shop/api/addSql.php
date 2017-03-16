<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/23
 * Time: 16:43
 */
@$link=mysql_connect('localhost','root','') or die("连接失败");//连接数据库，服务器，用户名，密码
mysql_select_db('shop');//查看数据库day10,
mysql_query('set names utf8');//设置字符集

$products=array(
    101=>array("name"=>"商品名称1","img"=>"1.jpg", "price"=>66.66, "sales"=>102, "amount"=>605, "hot"=>97),
    102=>array("name"=>"商品名称2", "img"=>"2.jpg", "price"=>68.66, "sales"=>152, "amount"=>260, "hot"=>79),
    103=>array("name"=>"商品名称3", "img"=>"3.jpg", "price"=>68.88, "sales"=>224, "amount"=>206, "hot"=>87),
    104=>array("name"=>"商品名称4", "img"=>"4.jpg", "price"=>66.88, "sales"=>122, "amount"=>800, "hot"=>89),
    105=>array("name"=>"商品名称5", "img"=>"5.jpg", "price"=>88.66, "sales"=>524, "amount"=>280, "hot"=>86),
    106=>array("name"=>"商品名称6", "img"=>"6.jpg", "price"=>69.66, "sales"=>105, "amount"=>805, "hot"=>69),
    107=>array("name"=>"商品名称7", "img"=>"7.jpg", "price"=>66.99, "sales"=>152, "amount"=>900, "hot"=>84),
    108=>array("name"=>"商品名称8", "img"=>"8.jpg", "price"=>66.69, "sales"=>212, "amount"=>290, "hot"=>49),
    109=>array("name"=>"商品名称9", "img"=>"7.jpg", "price"=>99.66, "sales"=>124, "amount"=>209, "hot"=>83),
    110=>array("name"=>"商品名称10", "img"=>"6.jpg", "price"=>99.99, "sales"=>114, "amount"=>905, "hot"=>39)
);

foreach($products as $key=>$value){
    $name=$value['name'];
    $img=$value['img'];
    $price=$value['price'];
    $sales=$value['sales'];
    $amount=$value['amount'];
    $hot=$value['hot'];
    $sql="insert into products values($key,'$name','$img',$price,$sales,$amount,$hot)";
   // echo $sql."<br/>";
    $result=mysql_query($sql);
    if($result){
        echo $key."成功";
    }else{
        echo $key."失败";
    }
}