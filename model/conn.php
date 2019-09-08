<?php
	
	$db_host = "39.96.5.90";
	$db_user = "whbs";
	$db_pass = "wh123456";
	$db_port = 3306;
	$db_name = "wh_bookstore";
	$db_charset = "utf8";


    @$db = mysqli_connect($db_host, $db_user, $db_pass);
    if(mysqli_connect_errno()){
        echo '连接数据错误，请重新再试';
        exit;
    }

    mysqli_set_charset ( $db, 'utf8' );

    mysqli_select_db ( $db, 'wh_bookstore');

