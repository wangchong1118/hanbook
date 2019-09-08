<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="./static/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./static/css/style.css" />
    <script src="./static/js/jquery.min.js"></script>
    <title>晗影书城_修改头像</title>
</head>
<body>
    <?php require('./model/islogin.php'); ?>
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
                <li>
                    <a href="./add_book.php">上架新书</a>
                </li>
                <li class="active">
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
                    <label class="col-sm-3 control-label">头像：</label>
                    <div class="col-sm-2">
                        <label for="file_avatar" class="btn btn-info" style="width: 100%;line-height: 32px;">选择头像</label>
                        <input id="file_avatar" type="file" name="uavatar[]" style="display:none">
                    </div>
                    <div class="col-sm-4" style="padding: 0;">
                        <p id="path_avatar" style="line-height: 32px;margin: 0;">jpg、png 格式，尺寸 96*96px</p>
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
                        $("#file_avatar").change(function(){
                            $("#path_avatar").html($(this).val());
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
    require('./model/upload.php');
    require('./model/conn.php');

    $sql_user = "SELECT avatar FROM user WHERE name = '".$_SESSION['uname']."'";
    $res_user = mysqli_query($db, $sql_user);
    $user = mysqli_fetch_assoc($res_user);

    if( isset($user['avatar'] ) ){
        $avatar_origin = "./upload/avatar/".$user['avatar'];
        if( file_exists($avatar_origin) ){
            unlink($avatar_origin);
        }
    }

    $avatar = substr($distname, 16);

    $sql_revatar = "UPDATE user SET avatar = '". $avatar ."' WHERE name = '".$_SESSION['uname']."'";

    mysqli_query($db, $sql_revatar);
    echo "<script>alert('头像修改成功');</script>";
