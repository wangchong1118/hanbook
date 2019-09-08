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

    $book_id = isset($_GET['id']) ? $_GET['id'] : 1;
    $sql_books = "SELECT * FROM books WHERE id = ".$book_id;
    $res_books = mysqli_query($db, $sql_books);
    $book = mysqli_fetch_assoc($res_books);
?>
<div class="container">
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

    <ol class="breadcrumb mg-top-40">
        <li><a href="#">首页</a></li>
        <?php
            $sql_cate= "SELECT id, title FROM category WHERE id = ".$book['cid'];
            $res_cate = mysqli_query($db, $sql_cate);
            $cate = mysqli_fetch_assoc($res_cate);
        ?>
        <li><a href="./list.php?id=<?php echo $cate['id'] ?>"><?php echo $cate['title'] ?></a></li>
        <li class="active"><?php echo $book['title'] ?></li>
    </ol>

    <div class="jumbotron">
        <div class="media">
            <div class="media-left">
                <span>
                    <img class="media-object" src="./upload/bookimg/<?php echo $book['bookimg']; ?>" alt="...">
                </span>
            </div>
            <div class="media-body">
                <h4 class="media-heading"><?php echo $book['title']; ?></h4>
                <ul class="infolist">
                    <li>
                        <strong>作者：</strong>
                        <span><?php echo $book['author']; ?></span>
                    </li>
                    <li>
                        <strong>出版日期：</strong>
                        <span><?php echo $book['pubdate']; ?></span>
                    </li>
                    <li>
                        <strong>销量：</strong>
                        <span><?php echo $book['salenum']; ?></span>
                    </li>
                    <li>
                        <strong>简介：</strong>
                        <span><?php echo $book['intr']; ?></span>
                    </li>
                    <li>
                        <strong>价格：</strong>
                        <span class="price"><?php echo $book['price']; ?></span>
                    </li>
                </ul>
                <div class="mg-top-15">
                    <a href="javascript:alert('亲，暂时还买不了哟...');" class="btn btn-success">立即购买</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mg-top-40 list-info">
        <h3 class="catetitle">相关推荐</h3>
        <div class="list-info-wrap">
            <?php
                $sql_tjbooks= "SELECT id, title, bookimg, intr, price FROM books WHERE cid = ".$book['cid']." LIMIT 6";   

                include('./model/booklist.php');
            ?>
        </div>
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
