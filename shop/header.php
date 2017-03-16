<?php
session_start();
?>
<header>
    <?php
        //var_dump(__FILE__);//当前此文件的路径
        //var_dump($_SERVER['PHP_SELF']);//地址栏的url
    //获取当前页面的url.的文件名路径,basename
   $path=basename($_SERVER['PHP_SELF']);
    $index=$path=="index.php"?"class='active'":" ";
    $products=$path=="products.php"?"class='active'":" ";
    $detail=$path=="detail.php"?"class='active'":" ";
    $shopcar=$path=="shopcar.php"?"class='active'":" ";

    //判断是否登录
    if(isset($_SESSION['username'])){
        echo <<<j
            <div class="login">
                <a href="javascript:void(0)">{$_SESSION['username']}</a>|<a href="loginhost.php">退出</a>
            </div>
j;

    }else{
        echo <<<ex
            <div class="login">
                <a href="login.html">登录</a>|<a href="register.html">注册</a>
            </div>
ex;

    }
    ?>

    <nav>
        <ul class="nav clearfix">
            <li <?php echo $index ?>><a href="index.php">首页</a></li>
            <li <?php echo $products?>><a href="products.php">商品</a></li>
            <li <?php echo $detail?>><a href="detail.php">已浏览过的商品</a></li>
            <?php
            if(isset($_SESSION['cart'])){//购物车数量，等于它的length
                $num=count($_SESSION['cart']);
                echo <<<namespace
                <li {$shopcar}><a href="shopcar.php">购物车(<span class="number">{$num}</span>)</a></li>
namespace;
            }else{
                echo <<<name
                <li {$shopcar}><a href="shopcar.php">购物车(<span class="number">0</span>)</a></li>
name;
            }
            ?>
        </ul>
    </nav>
</header>