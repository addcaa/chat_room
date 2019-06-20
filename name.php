<?php

if(empty($_COOKIE['uid'])){
    echo "<script>alert('请先添加用户');location.href='/';</script>";
}
$uid=$_COOKIE['uid'];
$host= '192.168.137.1';
$db='chat';
$db_user='root';
$db_pwd='root';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db",$db_user,$db_pwd);
    // 设置 PDO 错误模式，用于抛出异常
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="select * from user where uid=$uid";
    $arr=$conn->query($sql);
    $info=[];
    foreach($arr as $v){
        $info['uid']=$v['uid'];
        $info['name']=$v['name'];
    }
    setcookie('name',$info['name']);
    echo $arr=json_encode($info,JSON_UNESCAPED_UNICODE);
//    $array=[
//        'ip'=>$_SERVER["REMOTE_ADDR"],
//        'uid'=>$info['uid'],
//    ];
    // 使用 exec() ，没有结果返回

    //方法获取ID
//    $uid=$conn->lastInsertId();
//    setcookie('uid',$uid);
//    echo $arr=json_encode([
//        'on'=>0,
//        'msg'=>"添加成功"
//    ],JSON_UNESCAPED_UNICODE);
}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

