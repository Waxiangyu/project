<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/1
 * Time: 13:26
 */
session_start();
//echo "test for addcar";
/*�жϴ����id��session��cart�������Ƿ����
    �������----->����Ʒ������1������Ӧ����Ʒ��Ϣ��cart�������λ���ö�
    ���������---->����Ӧid����Ʒ��Ϣ����cart���飬Ĭ������1

*/

include "db.php";
//��ӹ��ﳵ��Ʒ
//�����ַ����id
if(isset($_GET['addId'])){
    $id =(int)$_GET['addId'];
    //ȡ����Ӧid����Ʒ��Ϣ
    $product_info = $products[$id];
    //����ǵڶ������ﳵ�����Ʒ�����session��ȡ�����ﳵ���鲢����������Ԫ��
    if(isset($_SESSION['cart'])){
        //�жϴ����id�Ƿ��ڹ��ﳵ���鵱��
        //1,ȡ�����ﳵ�Ѵ��ڵĹ��ﳵ����
        $arr = $_SESSION['cart'];
        //�ж�id�Ƿ����
        if(array_key_exists($id,$arr)){//����$arr�Ƿ���keyֵ$id
            $arr[$id]['count']++;//�жϸ���Ʒid�Ƿ��Ѿ������飬����count+1'
        }else{
            $arr[$id] = array(//���ﳵ��������µ���Ʒ��Ϣ,Ĭ��countΪ1
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
        //������ﳵ�������ڣ����½�һ���������ڴ�Ź��ﳵ��Ϣ
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
