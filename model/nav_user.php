<?php
    if(isset($_SESSION['uname'])){
        $sql_user = "SELECT name, avatar FROM user WHERE name = '".$_SESSION['uname']."'";
        $res_user = mysqli_query($db, $sql_user);
        $users = mysqli_fetch_assoc($res_user);

        $uname = $users['name'];
        $uavatar = $users['avatar'];

        echo "<a href='./logout.php' class='btn btn-link navbar-btn pull-right mg-top-10 mg-right--15'>退出</a>
<a href='./admin.php' class='pull-right line-height-32 mg-top-10 mg-right-5 color-primary'>";
        echo $uname;
        echo "</a><img src='./upload/avatar/";
        if(isset($uavatar)){
            echo $uavatar;
        }else{
            echo "avatars_5d16ef88c655f.jpg";
        }
        echo "' alt='";
        echo $uname;
        echo "' class='pull-right mg-right-5 nav-avatar' />";
    }else{
        echo "<a href='./login.html' class='btn btn-danger navbar-btn pull-right mg-right--15'>登录</a>
<a href='./reg.html' class='btn btn-success navbar-btn pull-right mg-right-15'>注册</a>";
    }
