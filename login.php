<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/17
 * Time: 下午3:38
 */

@ob_start();

$username = array_key_exists('username', $_REQUEST) ? $_REQUEST['username'] : '';
$pwd = array_key_exists('password', $_REQUEST) ? md5($_REQUEST['password']) : '';

session_start();

$query_user = "select p_id from tb_user where name = '$username' and pwd = '$pwd'";

$db = new mysqli('localhost:3306', 'root', '', 'test');
echo 'he';
if($db->connect_errno) {
    echo '连接数据库失败<br>' . $db->connect_error;
    exit;
} else {
    echo 'lll';
}
$result = $db->query($query_user);
print_r($result);
if($result) {
    echo '执行成功<br>';
    $row = $result->fetch_array();
    if($row) {
        echo '登陆成功';

        $_SESSION['user_id'] = $row['p_id'];
        header("refresh:0;url=panel.php");
    } else {
        echo '登陆失败';
    }

} else {
    echo 'test';
}

@ob_end_flush();
