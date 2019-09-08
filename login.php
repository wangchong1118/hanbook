<?php

require('./model/conn.php');
header("Content-Type: text/html;charset=utf-8");

$sql_user = "SELECT name, pass FROM user WHERE name = '".$_POST['uname']."'";
$res_user = mysqli_query($db, $sql_user);
$users = mysqli_fetch_assoc($res_user);

$uname = $users['name'];
$upass = $users['pass'];

if(isset($_POST['uname']) && empty($_POST['uname'])){
    echo "<script>alert('用户名不能为空');history.back();</script>";
    exit();
}
if(isset($_POST['uname']) && empty($_POST['upass'])){
    echo "<script>alert('密码不能为空');history.back();</script>";
    exit();
}
if($_POST['upass'] != $upass){
    echo "<script>alert('账户或密码不正确');history.back();</script>";
    exit();
}

session_start();
$_SESSION['uname'] = $uname;
header("location:./admin.php");
