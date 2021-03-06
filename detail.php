<?php
$id = $_GET['id'];
$conn = mysqli_connect('localhost','root','root','mybbs');
if(mysqli_connect_errno() !== 0)
{
    die(mysqli_connect_error());
}
$sql = "SELECT * FROM post WHERE id = ".$id;
$result = mysqli_query($conn,$sql);
if(mysqli_errno($conn)!== 0){
    die(mysqli_error());
}

$row = mysqli_fetch_assoc($result);
//print_r($row);

//查询回帖
$sql = "SELECT * FROM post WHERE parent_id = " . $id;

$result = mysqli_query($conn, $sql);

if (mysqli_errno($conn) !== 0) {
    die(mysqli_error($conn));
}

$replies = [];
while($reply = mysqli_fetch_assoc($result)) {
    $replies[] = $reply;
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
                    <div class="crumbs_pages">
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="crumbs">
                                    <a href="">首页</a>
                                    >
                                    <span>新建帖子</span>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="post_btns">
                                    <button type="button" class="btn btn-info">回复</button>
                                    <button type="button" class="btn btn-warning">新建</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="newpost block">
<!--                        第一个detail是原贴 不能循环 得从第二个detail循环-->
                        <div class="detail">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="userinfo">
                                        <div class="avatar">
                                            <img src="static/pic/1.jpg" alt="">
                                        </div>
                                        <span class="nickname">andy</span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-10">
                                    <div class="post">
                                        <div class="post_header clearfix">
                                            <h2><?=$row['subject'] ?></h2>
                                            <span>#1</span>
                                        </div>
                                        <div class="meta">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <span>2018-01-20 06:30:48</span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <span>浏览数：100</span>
                                                    <span>回复数：99</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <img class="post_image" src="static/pic/165431313.png" alt="">
                                            <p><?= $row['content']?></p>
                                        </div>

                                        <div class="post_menu">
                                            <a href="#reply_form">回复</a>
                                            <a href="editpost.php?id=<?=$id?>">编辑</a>
                                            <a href="delpost.php?id=<?=$id?>">删除</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php foreach($replies as $reply):?>
                            <div class="detail">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="userinfo">
                                            <div class="avatar">
                                                <img src="static/pic/1.jpg" alt="">
                                            </div>
                                            <span class="nickname">andy</span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-10">
                                        <div class="post">
                                            <div class="post_header clearfix">
                                                <span>#1</span>
                                            </div>
                                            <div class="meta">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <span><?=$reply['post_at']?></span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <span>浏览数：100</span>
                                                        <span>回复数：99</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <!--<img class="post_image" src="static/pic/165431313.png" alt="">-->
                                                <p><?=$reply['content'] ?></p>
                                            </div>
                                            <div class="post_menu">
                                                <a href="#reply_form">回复</a>
                                                <a href="editpost.php?id=<?=$reply['id'];?>">编辑</a>
                                                <a href="delpost.php?id=<?=$reply['id'];?>">删除</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                       <!-- <div class="detail">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="userinfo">
                                        <div class="avatar">
                                            <img src="static/pic/1.jpg" alt="">
                                        </div>
                                        <span class="nickname">andy</span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-10">
                                    <div class="post">
                                        <div class="post_header clearfix">
                                            <span>#1</span>
                                        </div>
                                        <div class="meta">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <span>2018-01-20 06:30:48</span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <span>浏览数：100</span>
                                                    <span>回复数：99</span>
                                                </div>
                                            </div>
                                        </div>
                                        <img class="post_image" src="static/pic/165431313.png" alt="">
                                        <p>Dependency injection container vs composition root>Dependency injection container vs composition root, Dependency injection container vs composition root>Dependency injection container vs composition root</p>
                                        <div class="post_menu">
                                            <a href="">回复</a> <a href="">编辑</a> <a href="">删除</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="detail">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="userinfo">
                                        <div class="avatar">
                                            <img src="static/pic/1.jpg" alt="">
                                        </div>
                                        <span class="nickname">andy</span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-10">
                                    <div class="post">
                                        <div class="post_header clearfix">
                                            <span>#1</span>
                                        </div>
                                        <div class="meta">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <span>2018-01-20 06:30:48</span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <span>浏览数：100</span>
                                                    <span>回复数：99</span>
                                                </div>
                                            </div>
                                        </div>
                                        <img class="post_image" src="static/pic/165431313.png" alt="">
                                        <p>Dependency injection container vs composition root>Dependency injection container vs composition root, Dependency injection container vs composition root>Dependency injection container vs composition root</p>
                                        <div class="post_menu">
                                            <a href="">回复</a> <a href="">编辑</a> <a href="">删除</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <div class="navs_pages">
                            <div class="row">
                                <div class="col-md-2">
                                    <button class="btn btn-warning">新建主题</button>
                                </div>
                                <div class="col-md-10">
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

                        <div class="detail reply_form">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="userinfo">
                                        <div class="avatar">
                                            <img src="static/pic/1.jpg" alt="">
                                        </div>
                                        <span class="nickname">andy</span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-10">
                                    <div class="postform" id = "reply_form">
                                        <form action = "savepost.php" method="post">
                                            <div class="form-group">
                                                <label for="subject">主题：</label>
                                                <input type="text" class="form-control" id="subject" name="subject">
                                            </div>

                                            <div class="form-group">
                                                <label for="content">内容：</label>
                                                <textarea class="form-control" rows="5" id="content" name="content"></textarea>
                                            </div>

                                            <!-- <div class="form-group row">
                                                 <div class="col-xs-5 col-md-2">
                                                     <label class="sr-only">验证码：</label>
                                                     <input type="text" class="form-control" id="authcode" name="authcode" placeholder="验证码">
                                                 </div>
                                                 <div class="col-xs-7 col-md-10">
                                                     <img class="authcod_img" src="static/pic/authcocd.jpg" alt="">
                                                 </div>
                                             </div>-->
                                            <input type="hidden" name="section_id" value="<?=$row['section_id'];?>">
                                            <input type="hidden" name="parent_id" value="<?= $id;?>">
                                            <button type="submit" class="btn btn-info">提交</button>
                                        </form>
                                    </div>
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
