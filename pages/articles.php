<?php
session_start();
$aid=$_GET["aid"];
include("../admin/db.php");
$ban="SELECT * FROM discuss";
$r=$db->query($ban);
$discuss=$r->fetch_all(MYSQLI_ASSOC);
$result1 = $db->query("SELECT * FROM discuss WHERE aid=$aid");
$dLenth=$result1->fetch_all(MYSQLI_ASSOC);
$art="SELECT * FROM article";
$t=$db->query($art);
$article=$t->fetch_all(MYSQLI_ASSOC);
$result =$db->query( "SELECT * FROM article WHERE id=$aid");
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

<body class="flat-blue landing-page">
<nav class="navbar navbar-inverse navbar-fixed-top  navbar-affix" role="navigation" data-spy="affix" data-offset-top="60">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <div class="icon fa fa-paper-plane"></div>
                <div class="title">我的博客</div>
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse " aria-expanded="true">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="../index.php">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
<div class="jumbotron app-header">
    <div class="container">
        <h2 class="text-center"><div class="color-white"><?php echo $aLenth["tittle"]?></div></h2>
        <p class="text-center color-white ">
            <?php echo $aLenth["summary"]?>
        <p class="text-center"><a class="btn btn-primary btn-lg app-btn" href="../index.php" role="button">返回主页 »</a></p>
    </div>
</div>
<div class="card primary col-sm-3" style="height: 1000px" >
    <div class="card-header">
        <div class="card-title">
            <div class="title">文章列表</div>
            <div class="description">选择你想看的</div>
        </div>
    </div>
    <ul class="list-group ">
        <?php  foreach ($article as $v):?><div>
            <a href="../pages/articles.php?aid=<?php echo $v["id"]?>">
                <li class="list-group-item">
                    <span class="badge"><?php
                        $cid=$v["id"];
                        $result2 = $db->query("SELECT COUNT(*) FROM discuss WHERE aid=$cid");
                        list($idLenth) = $result2->fetch_row();
                        echo $idLenth;
                        ?>
                        </span><?php echo $v["tittle"]?>
                </li>
            </a>
        <?php  endforeach;?>
    </ul>
</div>
<div class="card primary" style="height: 600px">
    <div class="card-header">
        <div class="card-title">
            <div class="title">Article</div>
            <div class="description">A card element that has jumbotron header</div>
        </div>
        <div class="pull-right card-action">
            <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modalCardJumbotronExample"><i class="fa fa-code"></i></button>
            </div>
        </div>
    </div>
    <div class="card-jumbotron no-padding col-sm-3" style="height: 400px" >
        <img src="../admin<?php echo $aLenth["thumb"]?>" style="height: 400px"  class="center-block img-responsive">
    </div>
    <div class="card-body col-sm-9 " >
        <h4 class="text-center"><?php echo $aLenth["tittle"]?></h4>
           <?php echo $aLenth["content"]?>
    </div>
</div>
<div class="card card-success">
    <div class="card-header">
        <div class="card-title">
            <div class="title"><i class="fa fa-comments-o"></i> 游客评论</div>
        </div>
    </div>
    <div class="card-body no-padding">
        <ul class="message-list">
            <?php  foreach ($dLenth as $v):?><div>
            <div class="row" style="padding: 20px 0">
                <li>
                    <img src="../img/profile/profile-1.jpg" style="width: 50px" class="profile-img pull-left">
                    <div class="message-block">
                        <div><span class="username">游客：<?php echo $v["name"]?></span> <span class="message-datetime">评论时间：<?php echo $v["date"]?></span>
                        </div>
                        <div class="message">
                            <?php echo $v["message"]?>
                        </div>
                    </div>
                </li>
            </div>
                <?php  endforeach;?>
            <a href="#" id="message-load-more">
                <li class="text-center load-more">
                    <i class="fa fa-refresh"></i> load more..
                </li>
            </a>
                <li>
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title "><i class="fa fa-comments-o"></i> 您的评论</div>
                        </div>
                    </div>
            <form action="../admin/datatable.php?aid=<?php echo $aid?>" method="post" style="padding-top: 20px">

                        <div class="row">
                            <div class="col-sm-6"><input id="name" name="name" type="text" class="form-control" placeholder="您的名字"> </div>
                            <div class="col-sm-6"><input id="email" name="email" type="email" class="form-control" placeholder="您的联系方式s"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12"><textarea id="message" name="message" class="form-control" rows="5"></textarea></div>
                        </div>
                        <div>
                            <button id="contact-submit" type="submit" class="center-block btn btn-success">Send</button>
                        </div>
                    </form>
                </li>
        </ul>
    </div>
</div>
<div class="container-fluid app-content-b contact-us">
    <div class="container">
        <div class="row featurette">
            <div class="col-md-6">
                <p class="color-white contact-us-description">Life is a journey, not the destination, but the scenery along the should be and the mood at the view.</p></div>
            <div class="col-md-6">
                <form action="../admin/datatable.php" method="post">

                    <div class="row">
                        <div class="col-sm-4"><i class="glyphicon glyphicon-earphone color-white fa-stack-2x" aria-hidden="true">800-820-820</i></div>
                        <div class="col-sm-8"><i class="fa fa-paper-plane color-white fa-stack-2x" aria-hidden="true"> 800-820-820@qq.com </i> </div>
                    </div>
                </form>
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
<!-- /.container -->
</body>

</html>
