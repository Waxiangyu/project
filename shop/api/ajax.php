<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/28
 * Time: 11:30
 */
//��
if(isset($_GET['add'])){
    //�Դ���id����Ʒ����+1
    $id=$_GET['add'];
    echo ++$_SESSION['cart'][$id]['count'];
}
//��
if(isset($_GET['redu'])){
    //��ȡ��Ʒid�������ﳵ����Ӧ����Ʒ������1
    $id = $_GET['redu'];
    if($_SESSION['cart'][$id]['count']>1){
        echo --$_SESSION['cart'][$id]['count'];
    }else{
        echo $_SESSION['cart'][$id]['count'];
    }

}

//ɾ�����ﳵ��Ʒ
if(isset($_GET['delId'])){
    $delId = (int)$_GET['delId'];
    $arr = $_SESSION['cart'];
    //�жϸ���Ʒ�Ƿ��ڹ��ﳵ����
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
    //ɾ���ɹ�֮���ٱ���
    $_SESSION['cart'] = $arr;
    //var_dump($_SESSION['cart']['id']['count'] );

}