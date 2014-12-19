<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/18
 * Time: 上午10:21
 */

class db {

    public $link;
    public $connected = false;

    public function __construct() {
        $this->init_db();
    }

    private function init_db() {
        $this->link = new mysqli('localhost:3306', 'root', '', 'test');
        if($this->link->errno) {
            $this->connected = false;
        } else {
            $this->connected = true;
        }
    }

    public function fetch_first_row($query) {
        $result = $this->link->query($query);
        $row = $result->fetch_array();
        return $row;
    }

    /**
     * @param $query 查询语句
     * @return bool
     */
    public function execut_one_sql($query) {
        return $this->link->real_query($query);
    }

}