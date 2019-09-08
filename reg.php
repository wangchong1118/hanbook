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
if(isset($_POST['upass']) && isset($_POST['upass2']) && $_POST['upass'] != $_POST['upass2']){
    echo "<script>alert('两次密码输入不一样，请重新输入');history.back();</script>";
    exit();
}
if(!empty($users)){
    echo "<script>alert('账户已存在');history.back();</script>";
    exit();
}

$sql_reg = "INSERT INTO user (name, pass) VALUES ('".$_POST['uname']."','".$_POST['upass']."')";
mysqli_query($db, $sql_reg);
header("location:./login.php");
