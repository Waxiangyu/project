<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>已浏览页面</title>
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/detail.css">
</head>
<body>
<?php

    include "api/db.php";



$id=rand(101,110);//如果没有浏览过时打开的样子
if(isset($_GET['id'])){
    $id=(int)$_GET['id'];
    //将浏览过的商品id存放到一个数组中去

    //如果是第二次及以上，先取出cookie里的已浏览过的商品id数组
    if(isset($_COOKIE['visited'])){
        $visited=unserialize($_COOKIE['visited']);
        //判断该商品id是否已经存在已浏览过的数组中
        $index=array_search($id,$visited);//array_search(查找的元素，哪个数组中去查找)
       if($index===false){//如果没找到，就添加进去。0也等于false,所以用权等
           //如果该商品id不在$visited中，则该商品id添加到数组的头部
           array_unshift($visited,$id);//添加到第一个头部去array_unshift(数组,元素)
        }else{//如果该商品已经被浏览过了，则将该商品的id在数组中删除，之地再将该商品id添加到数组头部
           unset($visited[$index]);
           array_unshift($visited,$id);
       }
       // var_dump( $index=array_search($id,$visited));
    }else{
        //如果是第一次浏览商品，则新建一个数组，将浏览过的数组id存放到数组
        $visited[]=$id;
    }
    //将浏览过的商品id数组 存放到cookie中
    setcookie("visited",serialize($visited),time()+60*60*60*7*24);

    //var_dump($visited);
}

$product=$products[$id];
//var_dump($_GET['id']);
//var_dump($product);
//$id=(int)$_GET['id'];
?>
<div class="container">
<?php
    //引入heaer代码
    // require "header.php";//一般放在网页加载开始位置，只加载一次，如果加载的代码有错，程序将停止运行并报出致命错误
    include "header.php";//一般放在控制流程里，可以多次加载
?>
    <?php
        echo<<<t
    <div class="product-item">
        <h2>{$product['name']}</h2>
        <img src="images/{$product['img']}" alt="product-1"/>
        <span>价格:{$product['price']}元</span>
        <div><button class="add" data-id="{$id}">加入购物车</button><span class="sales">销量:{$product['sales']}</span></div>
    </div>
t;

    ?>


<?php
    //引入页面底部内容
    include "footer.php";
?>
    <script src="js/jquery.js"></script>
    <script>
        $(".add").click(function(){
            var id = $(this).attr("data-id");
            $.get("api/addcar.php",{addId:id},function(data,status,xhr){
                var result = JSON.parse(data);
                if(result.issuccess){
                    alert("添加商品成功");
                    console.log(result);
                    //获取存放购物车数量的元素，更新其内容
                    $(".number").html(result.length);
                }else{
                    alert("添加商品失败");
                }
            });
        });
    </script>
</div>
</body>
</html>