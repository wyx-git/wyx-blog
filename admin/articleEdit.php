<?php
/**
 * Created by PhpStorm.
 * User: sb
 * Date: 2018/9/25
 * Time: 17:51
 */
$id=$_POST["id"];
$tittle=$_POST["tittle"];
$src=$_POST["URL"];
$date=$_POST["data"];
$summary=$_POST["summary"];
$content=$_POST["content"];
$tid=$_POST["tid"];
include("../admin/db.php");
$sql="UPDATE article SET tittle='{$tittle}',content='{$content}',date='{$date}',summary='{$summary}',thumb='{$src}',tid='{$tid}' WHERE id=$id";
$db->query($sql);
if ($db->affected_rows===1){
    $msg="修改成功";
    $href="../table/Article.php";
}else{
    $msg="修改失败";
    $href="../form/articleedit.php?id=$id";
}
include "message.php";