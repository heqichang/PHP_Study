<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/17
 * Time: 上午9:30
 */

$con = mysql_pconnect("localhost:3306", "root", "", "test");
if($con) {
    echo 'ok';
} else {
    exit;
}

$query = <<<EOD
CREATE TABLE `test`.`myTable_1` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));
EOD;

$result = mysqli_query($con, $query);
echo $result;

