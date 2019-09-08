<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="./static/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./static/css/style.css" />
    <script src="./static/js/jquery.min.js"></script>
    <script src="./static/js/bootstrap.min.js"></script>
    <script src="./static/js/main.js"></script>
    <title>晗影书城</title>
</head>
<body>
<?php
    require('./model/conn.php');
    session_start();
?>
<div class="container" style="min-height: 840px;">
    <nav class="navbar navbar-default navbar-home">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand pd-0" href="./index.php">
                    <img alt="晗影书城" src="./static/img/logo.png" />
                </a>
            </div>
            <ul class="nav navbar-nav mg-left-28">
                <?php include('./model/nav.php'); ?>
            </ul>
            <?php include('./model/nav_user.php'); ?>
        </div>
    </nav>
    <?php
        $cate_id = isset($_GET['id']) ? $_GET['id'] : 1;
        $sql_cate = "SELECT id, title FROM category WHERE id = ".$cate_id;
        $res_cate = mysqli_query($db, $sql_cate);
        $cate = mysqli_fetch_assoc($res_cate);
    ?>
    <ol class="breadcrumb mg-top-40">
        <li><a href="./">首页</a></li>
        <li class="active"><?php echo $cate['title']; ?></li>
    </ol>

    <div class="row mg-top-40">
    <?php
        $sql_books = "SELECT id, title, bookimg, intr, price FROM books WHERE cid = ".$cate_id;
        require('./model/booklist.php');
    ?>
    </div>

</div>

<!--footer-->
<div class="page-footer">
    <div class="wrapper">
        <img src="./static/img/qcode_wh.jpg" alt="王晗个人二维码" title="扫描二维码，添加我为好友">
        <div class="cont">
            <h3>王晗 PHP 项目实战 -- <a href="./index.php">晗影书城</a></h3>
            <span>扫描左侧二维码，添加我为好友</span>
            <span>该项目由王晗个人开发完成，所有版权归其个人所有</span>
        </div>
    </div>
</div>
</body>
</html>
