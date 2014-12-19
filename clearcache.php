<?php
// 初始化会话。
// 如果要使用会话，别忘了现在就调用：
@ob_start();
session_start();

include 'header.html';
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/17
 * Time: 下午5:24
 */
// 重置会话中的所有变量
$_SESSION = array();

// 如果要清理的更彻底，那么同时删除会话 cookie
// 注意：这样不但销毁了会话中的数据，还同时销毁了会话本身
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 最后，销毁会话
session_destroy();

echo '5秒后返回登录页';
header('refresh:5;url=main.php');

@ob_end_flush();