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
    $sql="select * from fd";
    $arr=$conn->query($sql);
    $info=[];
    $uid=[];
    foreach($arr as $v){
        $info['uid']=$v['uid'];
        $info['fd']=$v['fd'];
        $uid[]=$info['uid'];
//        echo $arr=json_encode($info,JSON_UNESCAPED_UNICODE);
    }
    $uidd=implode(',',$uid);
//    print_r($uid);
    $sql2="select * from user join fd on user.uid=fd.uid";
    $result = $conn->query($sql2);
    $r = $result->fetchAll();
    $uinfo=[];
    foreach($r as $v) {
        $u['uid'] = $v['uid'];
        $u['name'] = $v['name'];
        $u['fd'] = $v['fd'];
        $uinfo[]=$u;
    }
//    print_r($uinfo);
    echo json_encode($uinfo,JSON_UNESCAPED_UNICODE);


}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

