<?php
    // 上传书籍封面图
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		die();
	};

	if( !(isset($_POST['token']) && $_POST['token'] === 'upload') ){
		echo "<script>'非法操作'</script>";
		die();
	}

	if( isset($_FILES['uavatar']) ){
		$arr_file = $_FILES['uavatar'];
	}else if( isset($_FILES['bookimg']) ){
		$arr_file = $_FILES['bookimg'];
	}
	
	foreach($arr_file['error'] as $error){
		if($error != 0){
			echo "<script>alert('图片上传错误');</script>";
			die();
		}
	}

	$arr_type = ['image/jpeg', 'image/png', 'image/gif'];
	foreach($arr_file['type'] as $type){
		if( !in_array($type, $arr_type) ){
			echo "<script>alert('不是有效图片');</script>";
			die();
		}
	}

	foreach($arr_file['name'] as $key => $name){
		$srcname = $arr_file['tmp_name'][$key];
		$uniqid = uniqid('s_');
		$ext = pathinfo($name, PATHINFO_EXTENSION);

		if(isset($_FILES['uavatar'])){
			$distname = "./upload/avatar/avatar".$uniqid.'.'.$ext;
		}elseif( isset($_FILES['bookimg']) ){
			$distname = "./upload/bookimg/book".$uniqid.'.'.$ext;
		}

		move_uploaded_file($srcname, $distname);
	}
