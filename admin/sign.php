<!DOCTYPE html>
<html>

<head>
    <title>Flat Admin V.2 - Free Bootstrap Admin Templates</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="../lib/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../lib/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../lib/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="../lib/css/bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="../lib/css/checkbox3.min.css">
    <link rel="stylesheet" type="text/css" href="../lib/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../lib/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../lib/css/select2.min.css">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/themes/flat-blue.css">
</head>

<body class="flat-blue login-page">
<div class="container">
    <div class="login-box">
        <div>
            <div class="login-form row">
                <div class="col-sm-12 text-center login-header">
                    <i class="login-logo fa fa-connectdevelop fa-5x"></i>
                    <h4 class="login-title">后台管理系统</h4>
                </div>
                <div class="col-sm-12">
                    <div class="login-body">
                        <div class="progress" id="login-progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                Sign...
                            </div>
                        </div>
                            <form action="checkSign.php" name="myform" method="post">
                                <div class="control">
                                <input type="text" name="user" class="form-control" placeholder="请输入你的用户名"> <span></span> <br>
                                </div>
                                <div class="control">
                                <input type="password" name="password" class="form-control" placeholder="请输入你的密码"> <span></span> <br>
                                </div>
                                <div class="control">
                                <input type="password" name="Rpassword" class="form-control"> <span></span> <br>
                                </div>
                                <div class="login-button text-center">
                                    <input type="button" class="btn btn-primary" value="Sign">
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Javascript Libs -->
<script type="text/javascript" src="../lib/js/jquery.min.js"></script>
<script type="text/javascript" src="../lib/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../lib/js/Chart.min.js"></script>
<script type="text/javascript" src="../lib/js/bootstrap-switch.min.js"></script>

<script type="text/javascript" src="../lib/js/jquery.matchHeight-min.js"></script>
<script type="text/javascript" src="../lib/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../lib/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="../lib/js/select2.full.min.js"></script>
<script type="text/javascript" src="../lib/js/ace/ace.js"></script>
<script type="text/javascript" src="../lib/js/ace/mode-html.js"></script>
<script type="text/javascript" src="../lib/js/ace/theme-github.js"></script>
<!-- Javascript -->
<script type="text/javascript" src="../js/app.js"></script>
<script>
    let user=document.querySelector("[name=user]");
    let p1=document.querySelector("[name=password]");
    let p2=document.querySelector("[name=Rpassword]");
    let form=document.forms.myform;
    let submit=document.querySelector("[type=button]");
    let error=document.querySelectorAll("span");
    let flag1=false;flag2=false;flag3=false;
    user.onchange=function () {
        let val=user.value;
        if (val===""){
            flag1=false;
            error[0].innerHTML="你还莫得用户名";
            return;
        }
        let xhr=new XMLHttpRequest();
        xhr.open("get","checkrepeat.php?user="+val);
        xhr.send();
        xhr.onload=function () {
            let r=xhr.response;
            if (r==="1"){
                error[0].innerHTML="用户名可用";
                flag1=true;
            }else {
                flag1=false;
                error[0].innerHTML="用户名已注册";
            }
        };
        if (!/[0-9a-zA-Z]{4,10}/.test(val)){
            flag1=false;
            error[0].innerHTML="你滴用户名应该有4-10位的数字或字母组成";
            return;
        }
    };
    p1.onchange=function () {
        let val1=p1.value;
        if (val1===""){
            flag2=false;
            error[1].innerHTML="你还莫得密码";
            return;
        }
        if (!/[0-9a-zA-Z]{6,}/.test(val1)){
            flag2=false;
            error[1].innerHTML="你滴密码应该至少有6位的数字或字母组成";
            return;
        }
        error[1].innerHTML="密码可用";
        flag2=true;
    };
    p2.onblur=function(){
        let val2= p2.value;
        if (val2===""){
            flag3=false;
            error[2].innerHTML="请却认你的密码";
            return;
        }
        if (val2!==p1.value){
            // alert(p1.value);
            flag3=false;
            error[2].innerHTML="你两次输入滴密码不一样";
            return;
        }
        error[2].innerHTML="两次输入的密码相同";
        flag3=true;
    };
    submit.onclick=function () {
        if (flag1 && flag2 && flag3){
            form.submit();
        }
    };
</script>
</body>

</html>
