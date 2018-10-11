<?php
//var_dump($_POST);
$user=$_POST["user"];
$password=md5($_POST["password"]);
//var_dump($user,$password);
$con=new mysqli("127.0.0.1","root","","test","8089");
//$r=$con->query("");
$sql="INSERT INTO users(username,password) VALUES ('{$user}','{$password}')";
$con->query($sql);
//var_dump($con->affected_rows);
if ($con->affected_rows===1){
    $msg="注册成功";
    $href="login.php";
}else{
    $msg="注册失败";
    $href="sign.php";
}
include("message.php");