<?php
/**
 * Created by PhpStorm.
 * User: sb
 * Date: 2018/9/27
 * Time: 9:09
 */
$id=$_GET["id"];
include("../admin/db.php");
$sql="DELETE FROM discuss WHERE id=$id";
$db->query($sql);
if ($db->affected_rows===1){
    $msg="删除成功";
    $href="../table/datatable.php";
}else{
    $msg="删除失败";
    $href="../table/datatable.php";
}
include "message.php";