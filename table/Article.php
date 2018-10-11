<?php
session_start();
if  (!isset($_SESSION["LOGIN"])){
    $msg="请登录";
    $href="login.php";
    include "../admin/message.php";
}
include("../admin/db.php");
$sql="SELECT * FROM article";
$r=$db->query($sql);
$data=$r->fetch_all(MYSQLI_ASSOC);
//var_dump($data);
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
                        <li>数据管理</li>
                        <li class="active">文章管理</li>
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
                                                href="admin/loginout.php">Logout</a></button>
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
                        <li class="active panel panel-default dropdown">
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
                                        <li><a href="../table/Article.php" target="message">文章管理</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="panel panel-default dropdown">
                            <a data-toggle="collapse" href="#dropdown-form">
                                <span class="icon fa fa-file-text-o"></span><span class="title">数据修改</span>
                            </a>
                            <!-- Dropdown level 1 -->
                            <div id="dropdown-form" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                        <li><a href="../form/bannersql.php">轮播图修改</a>
                                        </li>
                                        <li><a href="../form/articlesql.php">文章修改</a>
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

                                        <li><a href="../index.php">Landing Page</a>
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
                    <span class="title">Article</span>
                    <div class="description">An article is a word that is used with a noun to specify grammatical definiteness of the noun</div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="card-header">

                                <div class="card-title">
                                    <div class="title">文章管理</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="datatable table table-striped" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>文章名称</th>
                                        <th>文章内容</th>
                                        <th>上传时间</th>
                                        <th>缩略图</th>
                                        <th>文章类型</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>文章名称</th>
                                        <th>文章简介</th>
                                        <th>上传时间</th>
                                        <th>缩略图</th>
                                        <th>文章类型</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php  foreach ($data as $v):?>
                                        <tr>
                                            <td><?php echo  $v["id"]?></td>
                                            <td><?php echo  $v["tittle"]?></td>
                                            <td class="col-md-4"><?php echo  $v["summary"]?></td>
                                            <td><?php $date=$v["date"];
                                                echo date("Y-m-d H:i:s",$date)?></td>
                                            <td style="width:200px;text-overflow: ellipsis;"><?php echo  $v["thumb"]?></td>
                                            <td ><?php echo  $v["tid"]?></td>
                                            <td>
                                                <a href="../form/articleedit.php?id=<?php echo  $v["id"] ?>" class="btn btn-primary btn-success">修改</a>
                                                <a href="../admin/articleDelete.php?id=<?php echo  $v["id"] ?>" class="btn btn-primary btn-danger">删除</a>
                                            </td>
                                        </tr>
                                        <div class="col-sm-4">
                                            <div class="panel fresh-color panel-primary">
                                                <div class="panel-heading">文章题目：<?php echo  $v["tittle"]?></div>
                                                <div class="panel-body" style="height: 200px">
                                                    <img src="../admin<?php echo $v["thumb"] ?>" alt="" height="170px" class="center-block">
                                                </div>
                                            </div>
                                        </div>
                                    <?php  endforeach;?>
                                    </tbody>
                                </table>
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
</body>

</html>
