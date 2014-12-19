<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/18
 * Time: 下午5:04
 */
$data = array();
//error_reporting(E_ALL);
//print_r($_FILES);
//echo $_FILES['pic']['name']."\n";
//echo $_FILES['pic']['type']."\n";
//echo $_FILES['pic']['size']."\n";
//echo $_FILES['pic']['tmp_name']."\n";

$dir = 'image/user/';
$filepath = $dir . basename($_FILES['pic']['name']);
//echo $filepath."\n";

//if(file_exists($_FILES['pic']['tmp_name'])) {
//    echo 'exist'."\n";
//}

if(move_uploaded_file($_FILES['pic']['tmp_name'], $filepath)) {
    //echo '上传成功';
    $data = array('success' => 'file uploaded', 'file' => $_FILES);
    //echo "<script>history.go(-1);</script>";
} else {
    $data = array('error' => 'failed');
//    echo '上传失败'.$_FILES['pic']['error'];
}
echo json_encode($data);
?>



