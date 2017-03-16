<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/1
 * Time: 13:26
 */
session_start();
//echo "test for addcar";
/*判断传入的id在session的cart数组里是否存在
    如果存在----->将商品数量加1，将相应的商品信息在cart数组里的位置置顶
    如果不存在---->将相应id的商品信息加入cart数组，默认数量1

*/

include "db.php";
//添加购物车商品
//如果地址栏有id
if(isset($_GET['addId'])){
    $id =(int)$_GET['addId'];
    //取出对应id的商品信息
    $product_info = $products[$id];
    //如果是第二次向购物车添加商品，则从session里取出购物车数组并向该数组添加元素
    if(isset($_SESSION['cart'])){
        //判断传入的id是否在购物车数组当中
        //1,取出购物车已存在的购物车数组
        $arr = $_SESSION['cart'];
        //判断id是否存在
        if(array_key_exists($id,$arr)){//查找$arr是否有key值$id
            $arr[$id]['count']++;//判断该商品id是否已经在数组，如有count+1'
        }else{
            $arr[$id] = array(//向购物车数组添加新的商品信息,默认count为1
                'name'=>$product_info['name'],
                'img'=>$product_info['img'],
                'price'=>$product_info['price'],
                'count'=>1
            );
        }

        $result = array(
            "issuccess"=>true,
            "length"=>count($arr)
        );
        $result_str = json_encode($result);
        echo $result_str;

    }else{
        //如果购物车数不存在，则新建一个数组用于存放购物车信息
        $arr = array();
        $arr[$id] = array(
            'name'=>$product_info['name'],
            'img'=>$product_info['img'],
            'price'=>$product_info['price'],
            'count'=>1
        );

        $result = array(
            "issuccess"=>true,
            "length"=>count($arr)
        );
        $result_str = json_encode($result);
        echo $result_str;
    }

    $_SESSION['cart'] = $arr;
}
