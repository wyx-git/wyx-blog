<?php
/**
 * Created by PhpStorm.
 * User: sb
 * Date: 2018/9/25
 * Time: 17:51
 */
$message=$_POST["message"];
$src=$_POST["URL"];
$data=$_POST["data"];
$content=$_POST["content"];
include("../admin/db.php");
$sql="INSERT INTO banner(message,src,data,content)VALUE ('{$message}','{$src}','{$data}','{$content}')";
$db->query($sql);
if ($db->affected_rows===1){
    $msg="添加成功";
    $href="../table/table.php";
}else{
    $msg="添加失败";
    $href="../form/bannersql.php";
}
include "message.php";