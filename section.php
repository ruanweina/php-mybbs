<?php
//传参
$section_id = $_GET['sid'];
//连接数据库
$conn = @mysqli_connect("localhost","root","root","mybbs");
if(mysqli_connect_errno() !==0) {
   die(mysqli_connect_error());
}
    //传参
    $section_id = $_GET['sid'];
    $sql = "SELECT * FROM post WHERE section_id = " . $section_id;
    $result = mysqli_query($conn,$sql);
    //检测查询错误
    if(mysqli_errno($conn) !==0){
        die(mysqli_error($conn));
    }
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
?>
<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <meta name="renderer" content="webkit">
        <title>BBS - Learnphp</title>

        <!-- Bootstrap -->
        <link href="static/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="static/css/style.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="header">
            <div class="wrap">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="logobar">
                                <div class="mainnav-oner icon hidden-md hidden-lg" id="mainnav-oner" data-target="#mainnav">
                                    <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
                                </div>
                                <div class="logo">
                                    <div class="image">
                                        <a href="">
                                            <img src="static/img/logo.png" alt="">
                                        </a>
                                    </div>
                                    <h1 class="title">
                                        <a href="">
                                            <span>BBS</span>
                                        </a>
                                    </h1>
                                </div>
                                <div class="search-oner icon hidden-md hidden-lg" id="search-oner" data-target="#search">
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="search" id="search">
                                <div class="search-offer icon hidden-md hidden-lg" id="search-offer" data-target="#search">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </div>
                                <form action="" method="get">
                                    <div class="input-group">
                                        <label class="sr-only" for="keyword">搜索：</label>
                                        <input type="text" class="form-control" id="keyword" placeholder="关键词">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info" type="button">搜索</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mainnav" id="mainnav">
                                <div class="usermenu">
                                    <div class="links">
                                        <a href="">登录</a>
                                        <span>/</span>
                                        <a href="">注册</a>
                                    </div>
                                    <div class="mainnav-offer icon hidden-md hidden-lg" id="mainnav-offer" data-target="#mainnav">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <ul class="list-inline navmenu">
                                    <li class="active">
                                        <a href="">Home</a>
                                    </li>
                                    <li>
                                        <a href="">Backend</a>
                                    </li>
                                    <li>
                                        <a href="">Frontend</a>
                                    </li>
                                    <li>
                                        <a href="">Database</a>
                                    </li>
                                    <li>
                                        <a href="">UI</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="wrap">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="crumbs_pages">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="crumbs">
                                            <a href="">首页</a>
                                            >
                                            <span>版块名称</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 hidden-xs">
                                        <div class="pages">
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination pagination-sm">
                                                    <li>
                                                        <a href="#" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                        </a>
                                                    </li>
                                                    <li><a href="#">1</a></li>
                                                    <li><span>...</span></li>
                                                    <li><a href="#">4</a></li>
                                                    <li class="active"><span>5 <span class="sr-only">(current)</span></span></li>
                                                    <li><a href="#">6</a></li>
                                                    <li><span>...</span></li>
                                                    <li><a href="#">10</a></li>
                                                    <li>
                                                        <a href="#" aria-label="Next">
                                                            <span aria-hidden="true">&raquo;</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section">
                                <div class="block">
                                    <?php foreach($rows as $row):?>
                                        <div class="post">
                                            <div class="row">
                                                <div class="col-md-2 hidden-xs hidden-sm">
                                                    <div class="avatar">
                                                        <img class="img-circle" src="static/pic/2.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="text">
                                                        <h2><a href="detail.php?id=<?=$row['id'];?>"><?= $row['subject'];?></a></h2>
                                                        <p><?= $row['content'];?></p>
                                                        <div class="meta">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <span>由 Dependency 发布于：<?= $row['post_at'];?></span>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <span>浏览数：100</span>
                                                                    <span>回复数：99</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                    <!--<div class="post">
                                        <div class="row">
                                            <div class="col-md-2 hidden-xs hidden-sm">
                                                <div class="avatar">
                                                    <img class="img-circle" src="static/pic/2.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="text">
                                                    <h2>Dependency injection container vs composition root</h2>
                                                    <p>Dependency injection container vs composition root>Dependency injection container vs composition root, Dependency injection container vs composition root>Dependency injection container vs composition root</p>
                                                    <div class="meta">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <span>由 Dependency 发布于：2018-01-20</span>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <span>浏览数：100</span>
                                                                <span>回复数：99</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post">
                                        <div class="row">
                                            <div class="col-md-2 hidden-xs hidden-sm">
                                                <div class="avatar">
                                                    <img class="img-circle" src="static/pic/2.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="text">
                                                    <h2>Dependency injection container vs composition root</h2>
                                                    <p>Dependency injection container vs composition root>Dependency injection container vs composition root, Dependency injection container vs composition root>Dependency injection container vs composition root</p>
                                                    <div class="meta">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <span>由 Dependency 发布于：2018-01-20</span>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <span>浏览数：100</span>
                                                                <span>回复数：99</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post">
                                        <div class="row">
                                            <div class="col-md-2 hidden-xs hidden-sm">
                                                <div class="avatar">
                                                    <img class="img-circle" src="static/pic/2.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="text">
                                                    <h2>Dependency injection container vs composition root</h2>
                                                    <p>Dependency injection container vs composition root>Dependency injection container vs composition root, Dependency injection container vs composition root>Dependency injection container vs composition root</p>
                                                    <div class="meta">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <span>由 Dependency 发布于：2018-01-20</span>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <span>浏览数：100</span>
                                                                <span>回复数：99</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post">
                                        <div class="row">
                                            <div class="col-md-2 hidden-xs hidden-sm">
                                                <div class="avatar">
                                                    <img class="img-circle" src="static/pic/2.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="text">
                                                    <h2>Dependency injection container vs composition root</h2>
                                                    <p>Dependency injection container vs composition root>Dependency injection container vs composition root, Dependency injection container vs composition root>Dependency injection container vs composition root</p>
                                                    <div class="meta">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <span>由 Dependency 发布于：2018-01-20</span>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <span>浏览数：100</span>
                                                                <span>回复数：99</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                    <div class="pages">
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination pagination-sm">
                                                <li>
                                                    <a href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li><a href="#">1</a></li>
                                                <li><span>...</span></li>
                                                <li><a href="#">4</a></li>
                                                <li class="active"><span>5 <span class="sr-only">(current)</span></span></li>
                                                <li><a href="#">6</a></li>
                                                <li><span>...</span></li>
                                                <li><a href="#">10</a></li>
                                                <li>
                                                    <a href="#" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="newpost_btn">
                                <!--传参-->
                                <a class="btn btn-warning btn-lg btn-block" href="newpost.php?sid=<?=$section_id;?>">新建主题</a>
                            </div>
                            <div class="secondary">
                                <div class="block">
                                    <h3 class="title">最新</h3>
                                    <ul class="list">
                                        <li>
                                            <a href="">Best way to include config.php</a>
                                        </li>
                                        <li>
                                            <a href="">Dependency injection container vs composition root?</a>
                                        </li>
                                        <li>
                                            <a href="">Never has this “SQLSTATE[HY000] [2002] Connection timed out” error before></a>
                                        </li>
                                        <li>
                                            <a href="">How to search inside Google JSON data</a>
                                        </li>
                                        <li>
                                            <a href="">Music or sound effects playing when reading sections</a>
                                        </li>
                                        <li>
                                            <a href="">Dependency injection container vs composition root?</a>
                                        </li>
                                        <li>
                                            <a href="">Never has this “SQLSTATE[HY000] [2002] Connection timed out” error before</a>
                                        </li>
                                        <li>
                                            <a href="">How to search inside Google JSON data</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="block">
                                    <h3 class="title">热帖</h3>
                                    <ul class="list">
                                        <li>
                                            <a href="">Best way to include config.php</a>
                                        </li>
                                        <li>
                                            <a href="">Dependency injection container vs composition root?</a>
                                        </li>
                                        <li>
                                            <a href="">Never has this “SQLSTATE[HY000] [2002] Connection timed out” error before></a>
                                        </li>
                                        <li>
                                            <a href="">How to search inside Google JSON data</a>
                                        </li>
                                        <li>
                                            <a href="">Music or sound effects playing when reading sections</a>
                                        </li>
                                        <li>
                                            <a href="">Dependency injection container vs composition root?</a>
                                        </li>
                                        <li>
                                            <a href="">Never has this “SQLSTATE[HY000] [2002] Connection timed out” error before</a>
                                        </li>
                                        <li>
                                            <a href="">How to search inside Google JSON data</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="wrap">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                <a href="">Home</a> / <a href="">Backend</a> / <a href="">Frontend</a> / <a href="">Database</a> / <a href="">UI</a>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p class="cpoyright">Copyright ©2018 bbs.onlyzen.cn, All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mask" id="mask"></div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="static/js/jquery-1.12.4.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="static/bootstrap-3.3.7/js/bootstrap.min.js"></script>

        <script src="static/js/header.js"></script>
    </body>
</html>
