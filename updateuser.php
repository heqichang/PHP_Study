<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/18
 * Time: 下午4:07
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

include 'header.html';
?>

<body>
<?php

$db = new db();
$user_db = new user($db);

$user_id = $_SESSION['user_id'];

$user = $user_db->get_user_by_pid($user_id);

if(count($user) < 1) {
    echo '连接数据库出现异常';
    exit;
}

?>
<table>
    <tr>
        <td>用户名</td>
        <td><input type="text" name="username" value="<?= $user['name'] ?>"></td>
    </tr>

    <tr>
        <td>邮箱</td>
        <td><input type="text" name="mail" value="<?= $user['mail'] ?>"></td>
    </tr>
    <tr>
        <td><img id="user_pic" style="width: 200px; height: 200px;" src="<?= $user['pic'] ? $user['pic'] : 'image/user/none.gif' ?>" /></td>
        <td>
            <form method="post" action="upload_file.php" enctype="multipart/form-data" onsubmit="return false;">
                <input id="file_input" type="file" name="pic">
                <input type="submit" class="button" value="上传">
                <button class="button" onclick="uploadFile()">ajax上传</button>
                <div id="file_message" style="color:red;"></div>
            </form>
        </td>
    </tr>
    <tr>
        <td style="column-span: 2;-webkit-column-span: 2;">
            <input type="button" class="button" value="提交" onclick="submitData()" />
        </td>
    </tr>
</table>

<script>
    var ajax, message, filename;
    function uploadFile() {
        var file_input = document.getElementById('file_input');
        message = document.getElementById('file_message');

        if(file_input.files.length < 1) {
            message.innerHTML = '还没有文件';
            return;
        }

        var data = new FormData();
        data.append('pic', file_input.files[0]);

        filename = file_input.files[0]['name'];

        ajax = new XMLHttpRequest();
        ajax.open('post', 'upload_file.php', true);
        ajax.onreadystatechange = processResponse;
        ajax.send(data);
    }

    function processResponse() {
        if(ajax.readyState == 4) {
            if(ajax.status == 200) {
                message.innerHTML = ajax.responseText;
                var response = JSON.parse(ajax.responseText);

                if(response['success']) {
                    var folder = 'image/user/';
                    var pic_path = folder + filename;
                    document.getElementById('user_pic').src = pic_path;
                }
            }
        }
    }

    function submitData() {
        var all_input = document.getElementsByTagName('input');
        var name, mail, pic;

        for(var i = 0, length = all_input.length; i < length; i++) {
            if(all_input[i].name === 'username') {
                name = all_input[i].value;
            }
            if(all_input[i].name === 'mail') {
                mail = all_input[i].value;
            }
            if(all_input[i].name === 'pic') {
                pic = all_input[i].value;
            }
        }

        if(!ajax) {
            ajax = new XMLHttpRequest();
        }

        ajax.open('post', 'updateuser_service.php', true);
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
        ajax.onreadystatechange = function() {
            if(ajax.readyState == 4) {
                if(ajax.status == 200) {
                    if(message) {
                        message.innerHTML = ajax.responseText;
                    } else {
                        document.getElementById('file_message').innerHTML = ajax.responseText;
                    }
                }
            }
        };
        if(pic && pic !== '') {
            pic = 'image/user/' + pic;
        }
        ajax.send('name=' + name + '&mail=' + mail + '&pic=' + pic);


    }
</script>


</body>

<?php
@ob_end_flush();
?>