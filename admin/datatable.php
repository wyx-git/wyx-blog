<?php
/**
 * Created by PhpStorm.
 * User: sb
 * Date: 2018/9/25
 * Time: 17:51
 */
$aid=$_GET["aid"];
$name=$_POST["name"];
$email=$_POST["email"];
$message=$_POST["message"];
$date=date("Y-m-d H:i:s");
include("../admin/db.php");
$sql="INSERT INTO discuss(aid,name,email,message,date)VALUE ('{$aid}','{$name}','{$email}','{$message}','{$date}')";
$db->query($sql);
if ($db->affected_rows===1){
    $msg="添加成功";
    $href="../pages/articles.php?aid=$aid";
}else{
    $msg="添加失败";
    $href="../pages/articles.php?aid=$aid";
}
include "message.php";