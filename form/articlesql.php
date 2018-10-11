<?php
session_start();
if  (!isset($_SESSION["LOGIN"])){
    $msg="请登录";
    $href="login.php";
    include "../admin/message.php";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>博客后台管理系统</title>
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

<body class="flat-blue">
<div class="app-container">
    <div class="row content-container">
        <nav class="navbar navbar-default navbar-fixed-top navbar-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-expand-toggle">
                        <i class="fa fa-bars icon"></i>
                    </button>
                    <ol class="breadcrumb navbar-breadcrumb">
                        <li>数据修改</li>
                        <li class="active">文章修改</li>
                    </ol>
                    <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                        <i class="fa fa-th icon"></i>
                    </button>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                        <i class="fa fa-times icon"></i>
                    </button>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-comments-o"></i></a>
                        <ul class="dropdown-menu animated fadeInDown">
                            <li class="title">
                                Notification <span class="badge pull-right">0</span>
                            </li>
                            <li class="message">
                                No new notification
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown danger">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-star-half-o"></i> 4</a>
                        <ul class="dropdown-menu danger  animated fadeInDown">
                            <li class="title">
                                Notification <span class="badge pull-right">4</span>
                            </li>
                            <li>
                                <ul class="list-group notifications">
                                    <a href="#">
                                        <li class="list-group-item">
                                            <span class="badge">1</span> <i class="fa fa-exclamation-circle icon"></i> new registration
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li class="list-group-item">
                                            <span class="badge success">1</span> <i class="fa fa-check icon"></i> new orders
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li class="list-group-item">
                                            <span class="badge danger">2</span> <i class="fa fa-comments icon"></i> customers messages
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li class="list-group-item message">
                                            view all
                                        </li>
                                    </a>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown profile">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION["LOGIN"]?> <span class="caret"></span></a>
                        <ul class="dropdown-menu animated fadeInDown">
                            <li class="profile-img">
                                <img src="../img/profile/picjumbo.com_HNCK4153_resize.jpg" class="profile-img">
                            </li>
                            <li>
                                <div class="profile-info">
                                    <h4 class="username"><?php echo $_SESSION["LOGIN"]?></h4>
                                    <p>emily_hart@email.com</p>
                                    <div class="btn-group margin-bottom-2x" role="group">
                                        <button type="button" class="btn btn-default"><i class="fa fa-user"></i> Profile</button>
                                        <button type="button" class="btn btn-default"><i class="fa fa-sign-out"></i><a
                                                href="../admin/loginout.php">Logout</a></button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="side-menu sidebar-inverse">
            <nav class="navbar navbar-default" role="navigation">
                <div class="side-menu-container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">
                            <div class="icon fa fa-paper-plane"></div>
                            <div class="title">博客后台管理系统</div>
                        </a>
                        <button type="button" class="navbar-expand-toggle pull-right visible-xs">
                            <i class="fa fa-times icon"></i>
                        </button>
                    </div>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="../admin/admin.php">
                                <span class="icon fa fa-tachometer"></span><span class="title">主页</span>
                            </a>
                        </li>
                        <li class="panel panel-default dropdown">
                            <a data-toggle="collapse" href="#dropdown-element">
                                <span class="icon fa fa-desktop"></span><span class="title">UI Kits</span>
                            </a>
                            <!-- Dropdown level 1 -->
                            <div id="dropdown-element" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                        <li><a href="../ui-kits/grid.html">Grid</a></li>
                                        <li><a href="../ui-kits/theming.html">Theming</a></li>
                                        </li>
                                        <li><a href="../ui-kits/button.html">Buttons</a>
                                        </li>
                                        <li><a href="../ui-kits/card.html">Cards</a>
                                        </li>
                                        <li><a href="../ui-kits/list.html">Lists</a>
                                        </li>
                                        <li><a href="../ui-kits/modal.html">Modals</a>
                                        </li>
                                        <li><a href="../ui-kits/alert.html">Alerts & Toasts</a>
                                        </li>
                                        <li><a href="../ui-kits/panel.html">Panels</a>
                                        </li>
                                        <li><a href="../ui-kits/loader.html">Loaders</a>
                                        </li>
                                        <li><a href="../ui-kits/step.html">Tabs & Steps</a>
                                        </li>
                                        <li><a href="../ui-kits/other.html">Other</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="panel panel-default dropdown">
                            <a data-toggle="collapse" href="#dropdown-table">
                                <span class="icon fa fa-table"></span><span class="title">数据管理</span>
                            </a>
                            <!-- Dropdown level 1 -->
                            <div id="dropdown-table" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                        <li><a href="../table/table.php">轮播图管理</a>
                                        </li>
                                        <li><a href="../table/datatable.php">评论管理</a>
                                        </li>
                                        <li><a href="../table/Article.php">文章管理</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="active panel panel-default dropdown">
                            <a data-toggle="collapse" href="#dropdown-form">
                                <span class="icon fa fa-file-text-o"></span><span class="title">数据修改</span>
                            </a>
                            <!-- Dropdown level 1 -->
                            <div id="dropdown-form" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                        <li><a href="bannersql.php">轮播图修改</a>
                                        </li>
                                        <li><a href="articlesql.php">文章修改</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!-- Dropdown-->
                        <li class="panel panel-default dropdown">
                            <a data-toggle="collapse" href="#component-example">
                                <span class="icon fa fa-cubes"></span><span class="title">Components</span>
                            </a>
                            <!-- Dropdown level 1 -->
                            <div id="component-example" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                        <li><a href="../components/pricing-table.html">Pricing Table</a>
                                        </li>
                                        <li><a href="../components/chartjs.html">Chart.JS</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!-- Dropdown-->
                        <li class="panel panel-default dropdown">
                            <a data-toggle="collapse" href="#dropdown-example">
                                <span class="icon fa fa-slack"></span><span class="title">Page Example</span>
                            </a>
                            <!-- Dropdown level 1 -->
                            <div id="dropdown-example" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                        <li><a href="../admin/login.php">Login</a>
                                        </li>
                                        <li><a href="../admin/message.php">Landing Page</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!-- Dropdown-->
                        <li class="panel panel-default dropdown">
                            <a data-toggle="collapse" href="#dropdown-icon">
                                <span class="icon fa fa-archive"></span><span class="title">Icons</span>
                            </a>
                            <!-- Dropdown level 1 -->
                            <div id="dropdown-icon" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                        <li><a href="../icons/glyphicons.html">Glyphicons</a>
                                        </li>
                                        <li><a href="../icons/font-awesome.html">Font Awesomes</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="../license.html">
                                <span class="icon fa fa-thumbs-o-up"></span><span class="title">License</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </div>
        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body">
                <div class="page-title">
                    <span class="title">文章添加</span>
                    <div class="description">An Article elements use in txt, pdf, word, etc.</div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="title">Input a new Artilce</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="../admin/articleinsert.php" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">文章名称</label>
                                        <input type="text" class="form-control" name="tittle">
                                    </div>
                                    <div class="form-group">
                                        <div class="show" ><img src="" alt="" style="width: 300px"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <input type="file" id="file" class="btn btn-default">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">时间戳</label>
                                        <input type="text" class="form-control data" name="data">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">URL</label>
                                        <input type="text" class="form-control data" name="URL" id="URL">
                                    </div>
                                    <input type="hidden" name="src" id="img">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">文章简介</label>
                                        <input type="text" class="form-control data" name="summary" value="不超过50字">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">文章内容</label>

                                        <!--编辑器位置-->
<!--                                        <div style="margin:50px 0" class="col-xs-12 col-lg-10 " >-->
                                            <div id="text" style="border:1px solid gray;min-height:240px">

                                            </div>
<!--                                        </div>-->

                                        <input type="hidden" name="content" id="content">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">文章类型</label>
                                        <div>
                                            <div class="radio3 radio-check radio-inline">
                                                <input type="radio" id="radio4" name="tid" value="txt" checked="">
                                                <label for="radio4">
                                                  txt
                                                </label>
                                            </div>
                                            <div class="radio3 radio-check radio-success radio-inline">
                                                <input type="radio" id="radio5" name="tid" value="pdf">
                                                <label for="radio5">
                                                   pdf
                                                </label>
                                            </div>
                                            <div class="radio3 radio-check radio-warning radio-inline">
                                                <input type="radio" id="radio6" name="tid" value="word">
                                                <label for="radio6">
                                                    word
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" value="预览上传" id="upload" class="btn btn-default">

                                    <input type="submit" value="添加文章" id="add" class="btn btn-default">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="app-footer">
        <div class="wrapper">
            <span class="pull-right">2.1 <a href="#"><i class="fa fa-long-arrow-up"></i></a></span> © 2015 Copyright.
        </div>
    </footer>
    <div>
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
        <script type="text/javascript" src="../js/wangEditor.min.js"></script>
        <script>
            let file=document.querySelector("#file");
            let upload=document.querySelector("#upload");
            let show=document.querySelector(".show img");
            let hidden=document.querySelector("#img");
            let data=document.querySelector(".data");
            let URL=document.querySelector("#URL");
            let text=document.querySelector("#text");
            let content=document.querySelector("#content");
            file.onchange=function () {
                let file=this.files[0];
                let fr=new FileReader();
                fr.readAsDataURL(file);
                fr.onload=function () {
                    show.src=fr.result;
                    data.value=new Date().getTime();
                }
            };
            upload.onclick=function () {
                let f=file.files[0];
                let fd=new FormData();
                fd.append("thumb",f);
                let xhr=new XMLHttpRequest();
                xhr.open("post","../admin/upload.php");
                xhr.send(fd);
                xhr.onload=function () {
                    let r=xhr.response;
                    hidden.value=r;
                    URL.value=hidden.value;
                };
                var $reason = $('#text').html();
                content.value=$reason;
                console.log(content.value);
            };
            var E = window.wangEditor;
            var editor = new E('#text');
            // 或者 var editor = new E( document.getElementById('editor') )
            editor.create()
                    </script>

</body>


</html>
