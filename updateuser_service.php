<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/19
 * Time: 下午12:06
 */

session_start();

require './lib/common.php';
require './lib/db.php';
require './model/user.php';

$data = array();

print_r($_REQUEST);

$is_complete_data = isset($_REQUEST['name'])
    && isset($_REQUEST['mail'])
    && isset($_REQUEST['pic']);

if($is_complete_data) {
    $name = $_REQUEST['name'];
    $mail = $_REQUEST['mail'];
    $pic = $_REQUEST['pic'];

    $user_id = $_SESSION['user_id'];

    $db = new db();
    $user_db = new user($db);
    $result = $user_db->update_user($user_id, array(
        'name' => $name,
        'mail' => $mail,
        'pic' => $pic
    ));

    if($result) {
        $data = array('success' => '修改成功');
    } else {
        $data = array('error' => '修改失败');
    }
}
echo json_encode($data);
