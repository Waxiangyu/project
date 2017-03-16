
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购物车</title>
    <link rel="stylesheet" href="css/global.css">

</head>
<body>
<div class="container">
<?php
include "header.php";//一般放在控制流程里，可以多次加载
include "api/db.php";

?>

<?php
//如果session里购物车有
//var_dump($_SESSION['cart']);
if(isset($_SESSION['cart'])&&count($_SESSION['cart'])>0){
    echo <<<tag
        <table border="1" cellpadding="0" cellspacing="2" align="center" width="100%">
            <thead>
                <tr align="center">
                    <td>商品Id</td>
                    <td>图片</td>
                    <td>名称</td>
                    <td>价格</td>
                    <td>数量</td>
                    <td>小计</td>
                    <td>操作</td>
                </tr>
            </thead>
tag;
    //取出购物车商品信息
    $arr=$_SESSION['cart'];
    $order_arr=array();
    foreach($arr as $key=>$value){
        array_unshift($order_arr,$key);//让后加的放在第一个。
    }
    $arr=$_SESSION['cart'];
    $totalprice = 0;
    foreach($order_arr as $key=>$value){
        $total=$arr[$value]['price']*$arr[$value]['count'];//总计。
        $totalprice += $total;
        echo <<<a
            <tr align="center">
                <td>{$value}</td>
                <td><img src="images/{$arr[$value]['img']}" alt="product-1"/></td>
                <td>{$arr[$value]['name']}</td>
                <td class="price">{$arr[$value]['price']}</td>
                <td><button class="add" data-id="{$value}">+</button><span>{$arr[$value]['count']}</span><button class="redu" data-id="{$value}">-</button></td>
                <td class="total">{$total}</td>
                <td><button class="del" data-id="{$value}">删除</button></td>
            </tr>
a;
    }
    echo <<<b
        <tr align='center'><td colspan='6'>总价</td><td class='totalprice'>{$totalprice}</td></tr>
        </table>
b;

}else {
    echo "购物车为空，<a href='index.php'>请前往购物</a>";
}
?>



<?php
    //引入页面底部内容
    include "footer.php";
?>
</div>
<script src="js/jquery.js"></script>
<script>
    //点击加号
    $(".add").click(function(){
        var obj=$(this)
        var id=$(this).attr("data-id")
        //console.log(id)
        $.get('api/ajax.php',{add:id},function(data,status,xhr){
            obj.next().html(data)
            calc(obj,data);
        })
    })
    //点击减号
    $(".redu").click(function(){
        var obj=$(this)
        var id=$(this).attr("data-id")
        //console.log(id)
        $.get('api/ajax.php',{redu:id},function(data,status,xhr){
            obj.prev().html(data)
            calc(obj,data);
        })
    })
    function calc(obj,data){
        //更新小计
        var total = data*obj.parent().parent().find(".price").html();
        obj.parent().parent().find('.total').html(total.toFixed(2));
        //更新总价
        var totalprice = 0;
        $.each($(".total"),function(index,value){
            //console.log(value);
            //console.log(index);
            totalprice += parseFloat($(value).html());
            //totalprice -= parseFloat($(value).html());
        });
        //console.log(totalprice);
        $(".totalprice").html(totalprice.toFixed(2));//toFixed四舍五入2位小数
    }

    //点击删除购物车商品
    $(".del").click(function(){
        // alert(111);
        //获取删除商品的id
        var id = $(this).attr("data-id");
        var obj = $(this);
        $.get("api/ajax.php",{delId:id},function(data,status,xhr){
            console.log(data)
            var result = JSON.parse(data);//把字符串转化为json对象
            //console.log(result)
            if(result.success){
                obj.parent().parent().remove();
                alert("删除成功");
                console.log(result.count);
                //获取存放购物车数量的元素，更新其内容
                $(".number").html(result.length);

            }else{
                alert("您所删除的商品id不存在");
            }
            var totalprice = 0;//更新总价
            $.each($(".total"),function(index,value){
                //console.log(value);
                //console.log(index);
                totalprice += parseFloat($(value).html());
                //totalprice -= parseFloat($(value).html());
            });
            //console.log(totalprice);
            $(".totalprice").html(totalprice.toFixed(2));//toFixed四舍五入2位小数
        });
    });
</script>

</body>
</html>