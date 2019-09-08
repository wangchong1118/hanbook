<?php
    if(isset($sql_tjbooks)){
        $sql_books = $sql_tjbooks;
    }
    $res_books = mysqli_query($db, $sql_books);
    $num_res_books = mysqli_num_rows($res_books);

    for ($i=0; $i<$num_res_books; $i++) {
        $book = mysqli_fetch_assoc($res_books);
        if(isset($sql_tjbooks)){
            echo "<div class='col-sm-4 col-md-2'><div class='thumbnail'><a href='./info.php?id=";
        }else{
            echo "<div class='col-sm-4 col-md-3'><div class='thumbnail'><a href='./info.php?id=";
        }
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
        echo "元</strong><a href='javascript:alert(\"亲，暂时还购买不了哟...\");' class='pull-right btn btn-sm btn-success'>购买</a></p></div></div></div>";
    }