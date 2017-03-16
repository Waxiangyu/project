<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/20
 * Time: 16:40
 */
session_start();
unset($_SESSION['username']);
echo "<script>location.href='./index.php'</script>";