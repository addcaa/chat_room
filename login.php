<?php
    $text=$_POST['text'];
    $host= '192.168.137.1';
    $db='chat';
    $db_user='root';
    $db_pwd='root';

try {
        $conn = new PDO("mysql:host=$host;dbname=$db",$db_user,$db_pwd);
        // 设置 PDO 错误模式，用于抛出异常
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="insert into user (name) value ('$text')";
        // 使用 exec() ，没有结果返回
        $conn->exec($sql);
        //方法获取ID
        $redis = new Redis();
        $redis->connect('127.0.0.1',6379);
        $uid=$conn->lastInsertId();
        setcookie('uid',$uid);
        $redis->set('uid',$uid);

    $ip=$_SERVER["REMOTE_ADDR"];
        setcookie('ip',$ip);
        echo $arr=json_encode([
            'on'=>0,
            'msg'=>"添加成功"
        ],JSON_UNESCAPED_UNICODE);
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
