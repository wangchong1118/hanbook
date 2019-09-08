<?php
    $sql_cate = "SELECT id, title FROM category";
    $res_cate = mysqli_query($db, $sql_cate);
    $num_res_cate = mysqli_num_rows($res_cate);

    $cid = isset($_GET['id']) ? $_GET['id'] : 0;
    if($cid == 0){
        echo "<li class='active'><a href='./index.php'>首页</a></li>";
    }else{
        echo "<li><a href='./index.php'>首页</a></li>";
    }

    for($i=0; $i<$num_res_cate; $i++){
        $cate = mysqli_fetch_assoc($res_cate);
        if($cid == $cate['id']){
            echo "<li class='active'><a href='./list.php?id=";
        }else{
            echo "<li><a href='./list.php?id=";
        }
        echo $cate['id'];
        echo "'>";
        echo $cate['title'];
        echo "</a></li>";
    }