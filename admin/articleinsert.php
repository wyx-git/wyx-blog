<?php
/**
 * Created by PhpStorm.
 * User: sb
 * Date: 2018/9/25
 * Time: 17:51
 */
$tittle=$_POST["tittle"];
$src=$_POST["URL"];
$date=$_POST["data"];
$summary=$_POST["summary"];
$content=$_POST["content"];
$tid=$_POST["tid"];
include("../admin/db.php");
$sql="INSERT INTO article(tittle,date,summary,content,thumb,tid)VALUE ('{$tittle}','{$date}','{$summary}','{$content}','{$src}','{$tid}')";
$db->query($sql);
if ($db->affected_rows===1){
    $msg="添加成功";
    $href="../table/Article.php";
}else{
    $msg="添加失败";
    $href="../form/articlesql.php";
}
include "message.php";