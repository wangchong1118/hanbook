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

        <div id="carousel-example-generic" class="carousel slide mg-top-40" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="./upload/slider/slider_1.jpg" alt="slider 1">
                    <div class="carousel-caption">
                        2018 款年狂欢，全城图书，疯狂半价
                    </div>
                </div>
                <div class="item">
                    <img src="./upload/slider/slider_2.jpg" alt="slider 2">
                    <div class="carousel-caption">
                        经典童话全集
                    </div>
                </div>
                <div class="item">
                    <img src="./upload/slider/slider_3.jpg" alt="slider 3">
                    <div class="carousel-caption">
                        销售职业丛书大全
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <?php
            $res_cate = mysqli_query($db, $sql_cate);

            while($cate = mysqli_fetch_assoc($res_cate)){

                $sql_books = "SELECT id, title, bookimg, price, intr FROM books WHERE cid = ".$cate['id']." LIMIT 4";
                $res_books = mysqli_query($db, $sql_books);

                $num_res_books = mysqli_num_rows($res_books);

                echo "<div class='row mg-top-40'><h3 class='catetitle'>";
                echo $cate['title'];
                echo "<a href='./list.php?id=";
                echo $cate['id'];
                echo "' target='_blank' class='pull-right'>&gt;More</a></h3>";

                for ($i=0; $i<$num_res_books; $i++) {
                    $book = mysqli_fetch_assoc($res_books);

                    echo "<div class='col-sm-4 col-md-3'><div class='thumbnail'><a href='./info.php?id=";
                    echo $book['id'];
                    echo "' class='pic'><img src='./upload/bookimg/";
                    echo $book['bookimg'];
                    echo "' alt='";
                    echo $book['title'];
                    echo "'></a><div class='caption'><a href='./info.php?id=";
                    echo $book['id'];
                    echo "' class='title'>";
                    echo $book['title'];
                    echo "</a><p class='intr'>";
                    echo $book['intr'];
                    echo "</p><p class='opr'><strong class='pull-left price'>";
                    echo $book['price'];
                    echo "元</strong><a href='javascript:alert(\"亲，暂时还买不了哟...\");' class='pull-right btn btn-sm btn-success'>购买</a></p></div></div></div>";
                }

                echo "</div>";
            }
        ?>

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
