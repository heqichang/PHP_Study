<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<header class="navbar"></header>
<div class="container">
    <div class="row">
        <div class="col-xs-6"></div>
        <div class="col-xs-6">
            <div class="row well">
                <div class="col-xs-6" style="border-right: solid gray 1px;">
                    <img src="image/logo.png">
                </div>
                <div class="col-xs-6">
                    <form action="login.php" method="post" name="login">
                        <table>
                            <tr>
                                <td><span>Username</span></td>
                                <td><input type="text" class="form-control" name="username"></td>
                            </tr>
                            <tr>
                                <td><span>Password</span></td>
                                <td><input type="password" class="form-control" name="password"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" class="btn btn-default" value="登陆">
                                    <button type="button" class="btn btn-default" onclick="location.href = 'register.php'">注册</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="bower_components/jquery/dist/jquery.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>

