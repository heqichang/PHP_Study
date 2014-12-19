<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/17
 * Time: 下午4:41
 */
@ob_start();
session_start();
require './lib/common.php';
require './lib/db.php';
require './model/user.php';



if(!common::isLogin()) {
    echo '登录失败，5秒后准备跳转';
    header('refresh:5;url=main.php');
    exit;
}

$db = new db();
$user_db = new user($db);

$user_id = $_SESSION['user_id'];

$user = $user_db->get_user_by_pid($user_id);

if(count($user) < 1) {
    echo '连接数据库出现异常';
    exit;
}

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
</head>
<body>
<header class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="clearcache.php">退出当前登录</a></li>
        </ul>
    </div>
</header>
<div class="container-fluid">
    <div class="row">
        <!--nav-->
        <div class="col-lg-3 col-md-2" style="background-color: darkgray;border: 2px solid darkgray;">
            <table style="width: 100%;text-align: center;">
                <tr>
                    <td><img src="<?= $user['pic'] ? $user['pic'] : 'image/user/none.gif' ?>" style="max-width: 200px;max-height: 200px;"></td>
                </tr>
                <tr>
                    <td><?= $user['name'] ?></td>
                </tr>
                <tr>
                    <td><a href="updateuser.php">修改个人信息</a></td>
                </tr>
            </table>
        </div>

        <div class="col-lg-9 col-md-10 col-xs-12">test</div>
    </div>
</div>

<script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>

<?php
@ob_end_flush();
?>