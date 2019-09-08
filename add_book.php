<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="./static/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./static/css/style.css" />
    <script src="./static/js/jquery.min.js"></script>
    <title>晗影书城_上架新书</title>
</head>
<body>
    <?php
        require('./model/islogin.php');
        require('./model/conn.php');
    ?>
    <nav class="navbar navbar-admin">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="./admin.php">
                    <img alt="Brand" src="./static/img/logo.png" />
                </a>
            </div>
            <a href="./logout.php" class="btn btn-danger navbar-btn pull-right">退出登录</a>
        </div>
    </nav>

    <div class="container mg-top-40">
        <div class="pull-left col-sm-3 mg-left--15 admin-aside">
            <h3>管理操作</h3>
            <ul>
                <li class="active">
                    <a href="./add_book.php">上架新书</a>
                </li>
                <li>
                    <a href="./set_avatar.php">修改头像</a>
                </li>
                <li>
                    <a href="./set_pass.php">修改密码</a>
                </li>
            </ul>
        </div>

        <div class="pull-right col-sm-9 mg-right--15 pd-right-0">
            <form method="POST" action="<?php print $_SERVER['PHP_SELF'] ?>" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-sm-3 control-label">书名：</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" placeholder="输入书籍名称">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">书籍类型：</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="type">
                            <option value="0">--请选择--</option>
                            <?php
                                $sql_cate = "SELECT id, title FROM category";
                                $res_cate = mysqli_query($db, $sql_cate);
                                $num_res_cate = mysqli_num_rows($res_cate);

                                for($i=0; $i<$num_res_cate; $i++){
                                    $cate = mysqli_fetch_assoc($res_cate);
                                    echo "<option value='";
                                    echo $cate['id'];
                                    echo "'>";
                                    echo $cate['title'];
                                    echo "</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">作者：</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="author" placeholder="输入书籍作者">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">简介：</label>
                    <div class="col-sm-6">
                        <textarea name="intr" rows="4" class="form-control" placeholder="暂无简介内容(选填)"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">发布日期：</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" name="pubdate" placeholder="选择想发布的日期">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">预设销量：</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="salenum" placeholder="输入初始就有的销量数字" value="0">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">封面：</label>
                    <div class="col-sm-2">
                        <label for="file_bookimg" class="btn btn-info" style="width: 100%;line-height: 32px;">选择封面</label>
                        <input id="file_bookimg" type="file" name="bookimg[]" style="display:none">
                    </div>
                    <div class="col-sm-4" style="padding: 0;">
                        <p id="path_bookimg" style="line-height: 32px;height: 32px;margin: 0;">jpg、png 格式，尺寸 238*260px</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">售价：</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="price" placeholder="输入价格">
                    </div>
                </div>
                <div class="form-group mg-top-40">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <input type="hidden" name="token" value="upload">
                        <input type="submit" class="form-control btn btn-danger" value="提交">
                    </div>
                    <div class="col-sm-3">
                        <a href="./admin.php" class="form-control btn btn-success">返回</a>
                    </div>
                </div>
                <script>
                    $(function(){
                        $("#file_bookimg").change(function(){
                            $("#path_bookimg").html($(this).val());
                        })
                    })
                </script>
            </form>
        </div>
    </div>
        
    <!--footer-->
    <div class="page-footer page-footer-fixed">
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
<?php
    if(isset($_POST['title'])){
        if(isset($_POST['title']) && empty($_POST['title'])){
            echo "<script>alert('书名不能为空');</script>";
            exit();
        }
        if(isset($_POST['type']) && $_POST['type'] == '0'){
            echo "<script>alert('书籍类型不能为空');</script>";
            exit();
        }
        if(isset($_POST['author']) && empty($_POST['author'])){
            echo "<script>alert('作者不能为空');</script>";
            exit();
        }
        if(isset($_POST['pubdate']) && empty($_POST['pubdate'])){
            echo "<script>alert('发布日期不能为空');</script>";
            exit();
        }
        if(isset($_POST['bookimg']) && empty($_POST['bookimg'])){
            echo "<script>alert('封面不能为空');</script>";
            exit();
        }
        if(isset($_POST['price']) && empty($_POST['price'])){
            echo "<script>alert('价格不能为空');</script>";
            exit();
        }

        require('./model/upload.php');
        $book_imgname = substr($distname, 17);

        $sql_addbook = "INSERT INTO books (cid, title, author, intr, bookimg, salenum, price, pubdate) VALUES ('";
        $sql_addbook = $sql_addbook.$_POST['type']."'";
        $sql_addbook = $sql_addbook.",'".$_POST['title']."'";
        $sql_addbook = $sql_addbook.",'".$_POST['author']."'";
        $sql_addbook = $sql_addbook.",'".$_POST['intr']."'";
        $sql_addbook = $sql_addbook.",'".$book_imgname."'";
        $sql_addbook = $sql_addbook.",'".$_POST['salenum']."'";
        $sql_addbook = $sql_addbook.",'".$_POST['price']."'";
        $sql_addbook = $sql_addbook.",'".$_POST['pubdate'];
        $sql_addbook = $sql_addbook."')";;

        mysqli_query($db, $sql_addbook);

        echo "<script>alert('新书上架成功');</script>";

    }
