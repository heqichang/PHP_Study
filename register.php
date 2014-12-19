<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/18
 * Time: 上午11:59
 */

require './lib/common.php';
require './lib/db.php';
require './model/user.php';

if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
    if(!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['mail'])) {
        echo '错误请求';
        exit;
    }
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $mail = $_POST['mail'];

    $db = new db();
    $user_db = new user($db);

    $insert_result = $user_db->insert_user($username, $pwd, $mail);
    if($insert_result) {
        echo '注册成功，请返回登录界面登录';
    } else {
        echo '插入失败';
    }
    exit;
}


?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <style>
        .center {
            width: auto;
            display: table;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="center well">
        <form action="register.php" method="post">
            <div class="h3 text-center">注册用户</div>
            <div class="row">
                <div class="col-xs-4">
                    用户名:
                </div>
                <div class="col-xs-8">
                    <input type="text" name="username" class="form-control" />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    密码:
                </div>
                <div class="col-xs-8">
                    <input type="text" name="password" class="form-control" />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    邮箱:
                </div>
                <div class="col-xs-8">
                    <input type="text" name="mail" class="form-control" />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2">

                </div>
                <div class="col-xs-10">
                    <input type="submit" value="提交" />
                </div>
            </div>
        </form>
    </div>
</div>
<script src="bower_components/jquery/dist/jquery.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>