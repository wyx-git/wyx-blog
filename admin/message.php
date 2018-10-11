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
                                Log In...
                            </div>
                        </div>
                        <form action="" method="post">
                            <h4><?php echo $msg ?></h4>
<!--                            欢迎你，--><?php //echo $_SESSION["LOGIN"]?>
                            <h4>还有 <span>3</span> 秒时间 <a id="href" href="<?php echo $href ?>">跳转</a></h4>
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
    let span=document.querySelector("span");
    let a=document.querySelector("#href");
    let n=3;
    let t=setInterval(function () {
        span.innerHTML=n;
        n--;
        if (n===0){
            location.href=a.href;
            clearInterval(t);
        }
    },1000);
</script>
</body>

</html>
