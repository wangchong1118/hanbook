<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="./static/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./static/css/style.css" />
    <title>晗影书城后台管理</title>
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
                <li>
                    <a href="./set_avatar.php">修改头像</a>
                </li>
                <li>
                    <a href="./set_pass.php">修改密码</a>
                </li>
            </ul>
        </div>

        <div class="pull-right col-sm-9 mg-right--15 pd-right-0">
          <div class="jumbotron">
              <h2><?php echo $_SESSION['uname']; ?>，你好！</h2>
              <p class="fs-16 line-height-36">这里是后台信息管理界面，你可以进行上架新书、修改账户头像和账户密码等操作</p>
              <p><a class="btn btn-success" href="./" role="button">去首页看书</a></p>
          </div>
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
