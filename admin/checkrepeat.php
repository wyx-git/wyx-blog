<?php

$username=$_GET["user"];
$con=new mysqli("127.0.0.1","root","","test","8089");
$sql="SELECT * FROM users WHERE username='$username'";
$r=$con->query($sql);
$res=$r->fetch_assoc();
if ($res){
    echo "0";
}else{
    echo "1";
}