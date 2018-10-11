<?php
/**
 * Created by PhpStorm.
 * User: sb
 * Date: 2018/9/25
 * Time: 17:15
 */
header("Content-Type:text/html;charset=utf-8");
$db=new mysqli("127.0.0.1","root","","blog","8089");
if ($db->connect_errno){
    echo "数据库连接失败<br>"+$db->connect_error;
    exit();
}
$db->query("SET NAMES UTF8");