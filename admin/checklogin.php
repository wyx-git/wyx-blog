<?php
$user=$_POST["user"];
$password=$_POST["password"];
//$code=$_POST["code"];
session_start();
//if (strtoupper($_SESSION["code"])!==strtoupper($code)){
//    $msg="验证码错误";
//    $href="login.php";
//    include("message.php");
//    exit();//退出脚本
//}
$con=new mysqli("127.0.0.1","root","","test","8089");
$sql="SELECT * FROM users WHERE username='$user'";
$r=$con->query($sql);
$res=$r->fetch_assoc();
if ($res){
    if (md5($password)===$res["password"]){
//        session_start();
        $_SESSION["LOGIN"]=$user;
        $msg="登录成功";
        $href="admin.php";
    }else{
        $msg="密码错误";
        $href="login.php";
    }
}else{
    $msg="用户名不存在";
    $href="login.php";

}
include("message.php");