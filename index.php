<?php
session_start();
include("admin/db.php");
$ban = "SELECT * FROM banner limit 4";
$r = $db->query($ban);
$banner = $r->fetch_all(MYSQLI_ASSOC);
$result1 = $db->query("SELECT COUNT(*) FROM banner ");
list($bLenth) = $result1->fetch_row();
$art = "SELECT * FROM article limit 4";
$t = $db->query($art);
$article = $t->fetch_all(MYSQLI_ASSOC);
$result = $db->query("SELECT * FROM article WHERE id=1");
$aLenth = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>

<head>
    <title>wyx-blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/checkbox3.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="lib/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="lib/css/select2.min.css">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/themes/flat-blue.css">
    <link rel="stylesheet" href="css/banner.css">
</head>

<body class="flat-blue landing-page">
<nav class="navbar navbar-inverse navbar-fixed-top  navbar-affix" role="navigation" data-spy="affix"
     data-offset-top="60">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <div class="icon fa fa-paper-plane"></div>
                <div class="title">My personal blog</div>
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse " aria-expanded="true">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
<div class="jumbotron app-header">
    <div class="container">
        <h2 class="text-center"><i class="app-logo fa fa-connectdevelop fa-5x color-white"></i>
            <div class="color-white">欢迎来到我的个人博客</div>
        </h2>
        <h4 class="text-center color-white">私のブログにようこそ</h4>
        <p class="text-center color-white ">Here you can read my life essay, learn my experience, and understand my
            personal abilities and hobbies. <br>
            他们是同龄人中工资最高的互联网精英，也是同龄人中发量最少的一群。
        <h5 class="text-center color-white app-description">
            ここではあなたが見ることができる私の生活エッセイ、勉強の心得；私の個人の能力と趣味を理解することができます </h5></p>
        <p class="text-center"><a class="btn btn-primary btn-lg app-btn" href="pages/articles.php?aid=1" role="button">Learn more »</a></p>
    </div>
</div>
<div class="container-fluid app-content-a">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 col-sm-6">
                <span class="fa-stack fa-lg fa-5x">
                  <i class="fa fa-circle-thin fa-stack-2x"></i>
                  <i class="glyphicon glyphicon-camera fa-stack-1x"></i>
                </span>
                <h2>摄影</h2>
                <p>竹外桃花，纷纷飘落。卿舞霓裳，君弹曲。高山流水，绕指尖幽幽荡漾。执一叶扁舟，在岁月的河流上，演绎一场不离散的笙歌，可好……</p>
            </div>
            <!-- /.col-lg-4 -->
            <div class="col-md-4 col-sm-6">
                <span class="fa-stack fa-lg fa-5x">
                  <i class="fa fa-circle-thin fa-stack-2x"></i>
                  <i class="fa fa-inbox fa-stack-1x"></i>
                </span>
                <h2>文章</h2>
                <p>浪迹天涯以后，还是要回到原点，回到原点以后，又开始羡慕仗剑走天涯。谁人在青春里失落，谁人又在青春里重生，所有走过的路，只剩这一湾眼前的风景。</p>
            </div>
            <!-- /.col-lg-4 -->
            <div class="col-md-4 col-sm-6">
                <span class="fa-stack fa-lg fa-5x">
                  <i class="fa fa-circle-thin fa-stack-2x"></i>
                  <i class="glyphicon glyphicon-list-alt fa-stack-1x"></i>
                </span>
                <h2>实例</h2>
                <p>　世界那么年夜，我想去看看。但咱们出去游览，不是“从自己待腻的处所到别人待腻的处所去看看”。咱们最初的想法便是去看看表面的世界，表面的风景与风俗，表面的人与物，是一种原始的内心渴求。</p>
            </div>
            <!-- /.col-lg-4 -->
        </div>
    </div>
</div>

<div class="container-fluid app-content-b ">
    <div class="container">
        <div class="row" style="overflow: hidden">
            <div class="col-md-9 banner">
                <?php foreach ($banner as $v): ?>
                    <div class="img img<?php echo $v["id"] ?> b\">
                        <img src="admin<?php echo $v["src"] ?> " class="col-md-12" alt="">
                        <div class="imgText"><?php echo $v["content"] ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-md-3">
                <?php foreach ($banner as $v): ?>
                    <div class="item item<?php echo $v["id"] ?>">
                        <span class="imgMessage" style="writing-mode: tb-rl;"><?php echo $v["message"] ?></span>
                        <img src="admin<?php echo $v["src"] ?> " class="col-md-10 " alt="">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid app-content-b feature-1">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-6">
            </div>
            <div class="col-md-5 col-sm-6 text-right color-white">
                <h2 class="featurette-heading"><?php echo $aLenth["tittle"] ?></h2>
                <p class="lead"><?php echo $aLenth["summary"] ?></p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid app-content-a">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center app-content-header">文章</h2>
                <p class="text-center app-content-description">
                    “ 你在桥上看风景，看风景的人在楼上看你。”
                    我们不要羡慕他人，因为你就是最美的一道风景。如果你无止境地羡慕，就会寝食难安，就会烦恼越来越多。其实，拥有一个好的心态，淡看世事，简单地生活，才会拥有快乐的人生！ </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row no-margin no-gap">
                    <?php foreach ($article as $v): ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="pricing-table dark-blue">
                                <div class="pt-header">
                                    <div class="plan-pricing">
                                        <div class="pricing"><?php echo $v["tittle"] ?></div>
                                        <div class="pricing-type"><?php $date = $v["date"];
                                            echo date("Y-m-d H:i:s", $date) ?></div>
                                    </div>
                                </div>
                                <div class="pt-body">
                                    <img src="admin/<?php echo $v["thumb"] ?>" height="150px" alt="">
                                    <p class="radio-inline"
                                       style="height:35px;overflow-y: hidden"><?php echo $v["summary"] ?></p>
                                </div>
                                <div class="pt-footer">
                                    <a href="pages/articles.php?aid=<?php echo $v["id"] ?>">
                                        <button type="button" class="btn btn-primary">查看详情</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid app-content-b contact-us">
    <div class="container">
        <div class="container">
            <div class="row featurette">
                <div class="col-md-6">
                    <p class="color-white contact-us-description">Life is a journey, not the destination, but the scenery along the should be and the mood at the view.</p></div>
                <div class="col-md-6">
                    <form action="admin/datatable.php" method="post">

                        <div class="row">
                            <div class="col-sm-4"><i class="glyphicon glyphicon-earphone color-white fa-stack-2x" aria-hidden="true">800-820-820</i></div>
                            <div class="col-sm-8"><i class="fa fa-paper-plane color-white fa-stack-2x" aria-hidden="true"> 800-820-820@qq.com </i> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /END THE FEATURETTES -->
<!-- FOOTER -->
<footer class="app-footer">
    <div class="container">
        <p class="text-muted">&copy; 2015, Tui2Tone Templates Studio.</p>
    </div>
</footer>
<!-- Javascript Libs -->
<script type="text/javascript" src="lib/js/jquery.min.js"></script>
<script type="text/javascript" src="lib/js/bootstrap.min.js"></script>
<script type="text/javascript" src="lib/js/Chart.min.js"></script>
<script type="text/javascript" src="lib/js/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="lib/js/jquery.matchHeight-min.js"></script>
<script type="text/javascript" src="lib/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="lib/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="lib/js/select2.full.min.js"></script>
<script type="text/javascript" src="lib/js/ace/ace.js"></script>
<script type="text/javascript" src="lib/js/ace/mode-html.js"></script>
<script type="text/javascript" src="lib/js/ace/theme-github.js"></script>
<script src="js/banner.js"></script>
<!-- /.container -->
</body>

</html>
