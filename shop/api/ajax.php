<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/28
 * Time: 11:30
 */
//加
if(isset($_GET['add'])){
    //对传入id的商品数量+1
    $id=$_GET['add'];
    echo ++$_SESSION['cart'][$id]['count'];
}
//减
if(isset($_GET['redu'])){
    //获取商品id，将购物车中相应的商品数量减1
    $id = $_GET['redu'];
    if($_SESSION['cart'][$id]['count']>1){
        echo --$_SESSION['cart'][$id]['count'];
    }else{
        echo $_SESSION['cart'][$id]['count'];
    }

}

//删除购物车商品
if(isset($_GET['delId'])){
    $delId = (int)$_GET['delId'];
    $arr = $_SESSION['cart'];
    //判断该商品是否在购物车当中
    if(array_key_exists($delId,$arr)){
        unset($arr[$delId]);
        //echo "success";
        $_SESSION['cart'] = $arr;
        $result = array(
            "success"=>true,
            "length"=>count($arr),
            "count"=>$_SESSION['cart']//[$delId]['count']
        );
        $result_str = json_encode($result);
        echo $result_str;
    }
    else{
        echo "error";
    }
    //删除成功之后再保存
    $_SESSION['cart'] = $arr;
    //var_dump($_SESSION['cart']['id']['count'] );

}