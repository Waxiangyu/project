
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <link rel="stylesheet" href="css/global.css"/>
    <link rel="stylesheet" href="css/index.css"/>
</head>
<body>
<div class="container">
    <?php
        //引入heaer代码
       // require "header.php";//一般放在网页加载开始位置，只加载一次，如果加载的代码有错，程序将停止运行并报出致命错误
        include "header.php";//一般放在控制流程里，可以多次加载
        include "api/db.php";
    ?>
    <div class="wrap clearfix">
        <div class="product clearfix">
            <?php
            $i=0;
                foreach($products as $key=>$value){
                    if($i==6)break;
                 echo <<<tagName
                   <div class="product-item">
                        <h2>{$value['name']}</h2>
                        <a href="detail.php?id={$key}"><img src="images/{$value['img']}" alt="product-1"/></a>
                        <span>价格：{$value['price']}</span>
                        <div><button class="add" data-id="{$key}">加入购物车</button><b class="sales">销量:{$value['sales']}</b></div>
                    </div>
tagName;
            $i++;
                }
            ?>
        </div>
        <div class="aside">
            <h2>已浏览过的商品</h2>
<?php
        //取出cookie中已浏览过的商品id数组

        if(isset($_COOKIE['visited'])) {//判断已浏览过的商品是否存在
            $visited=unserialize($_COOKIE['visited']);
            //遍历该数组，并且根据商品信息数组中取出第一浏览过的商品的详细信息
            foreach ($visited as $key => $value) {
                // $v[$value]=$products[$value];
                if ($key == 4) break;
                echo <<<tag
               <dl class="clearfix">
                    <dt><img src="images/{$products[$value]['img']}" alt="visited product"/></dt>
                    <dd>
                        <span>化妆品</span><span>{$products[$value]['price']}元</span>
                    </dd>
               </dl>
tag;
            }
        }
?>
        </div>
    </div>
    <?php
        //引入页面底部内容
        include "footer.php";
    ?>
</div>
<script src="js/jquery.js"></script>
<script>
    $(".add").click(function(){
        var id = $(this).attr("data-id");
        $.get("api/addcar.php",{addId:id},function(data,status,xhr){
            var result = JSON.parse(data);//把字符串转化为json对象
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
</body>
</html>