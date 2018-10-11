<?php
/**
 * Created by PhpStorm.
 * User: sb
 * Date: 2018/9/25
 * Time: 17:51
 */
$id=$_POST["id"];
$message=$_POST["message"];
$src=$_POST["URL"];
$data=$_POST["data"];
$content=$_POST["content"];
include("../admin/db.php");
$sql="UPDATE banner SET message='{$message}',src='{$src}',data='{$data}',content='{$content}' WHERE id=$id";
$db->query($sql);
if ($db->affected_rows===1){
    $msg="修改成功";
    $href="../table/table.php";
}else{
    $msg="修改失败";
    $href="../form/banneredit.php";
}
include "message.php";