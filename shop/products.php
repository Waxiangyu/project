
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>商品页面</title>
    <link rel="stylesheet" href="css/global.css"/>
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/products.css"/>
</head>
<body>
<div class="container">
    <?php
    //引入heaer代码
    // require "header.php";//一般放在网页加载开始位置，只加载一次，如果加载的代码有错，程序将停止运行并报出致命错误
    include "header.php";//一般放在控制流程里，可以多次加载
    include "api/db.php"
//    echo $_GET;//获取
    ?>
    <div class="order">
        <a href="products.php?type=price&order=desc">按价格</a>
        <a href="products.php?type=sales&order=asc">按销量</a>
        <a href="products.php?type=hot&order=asc">按人气</a>
    </div>

    <div class="wrap clearfix">
        <div class="product clearfix">
            <?php
            //asc升序  desc倒序
            function array_sort($arr,$type,$order='asc'){
                //假如先按价格排序，先提取出二维数组的价格
                //临时数组存储价格以及价格在相应的价格在products数组中对应的key值
                $tmp_arr=array();
                foreach($arr as $key=>$value){//遍历提取类型给$tmp_arr
                    $tmp_arr[$key]=$value[$type];//$value['price'],$key是$arr的key值。
                }
                // var_dump($tmp_arr);
                //对数字型数组 进行升序排序,arsort降序
                if($order=='asc'){
                    asort($tmp_arr);//直接张变值,给value值排序，同时改变key的顺序,引用传值
                }else{
                    arsort($tmp_arr);
                }
                // var_dump($tmp_arr);
                //新建数组，存放排序后的数组
                $new_arr=array();
                //将排序后的key值作为新数组的key值，$new_arr的value值来自$arr
                foreach($tmp_arr as $key=>$value){
                    $new_arr[$key]=$arr[$key];//遍历每一项都给到$new_arr,相当于arr[0]取出里面的数值。$key出来的是它的key值
                    //var_dump($arr[$key]);
                    //var_dump($arr[$value]);
                }
                //var_dump($new_arr);
                return $new_arr;
            }

            if(count($_GET)==''){//或：isset($_GET['type'])第一次进入该页面是否传有type值/或用：$_GET==null;
                $new=$products;
            }else{
                $type=$_GET['type'];
                $new=array_sort($products,$type,$_GET['order']);
            }

            foreach($new as $key=>$value){
                echo <<<tagName
                   <div class="product-item">
                        <h2>{$value['name']}</h2>
                        <a href="detail.php?id={$key}"><img src="images/{$value['img']}" alt="product-1"/></a>
                        <span>价格:{$value['price']}元</span>
                        <div><button class="add" data-id="{$key}">加入购物车</button><b class="sales">销量:{$value['sales']}</b></div>
                    </div>
tagName;

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
</body>
</html>