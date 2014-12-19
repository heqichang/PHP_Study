<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/18
 * Time: 上午10:10
 */

class user {

    public $db;


    public function __construct(&$db) {
        $this->db = $db;
    }

    public function get_user_by_pid($id) {
        $arr = array();
        if($this->db->connected) {
            $arr = $this->db->fetch_first_row("SELECT * FROM tb_user WHERE p_id = " . $id);
        }
        return $arr;
    }

    public function insert_user($name, $pwd, $mail) {
        $password = md5($pwd);
        $query = "INSERT INTO tb_user SET name='$name', pwd='$password', mail='$mail'";
        $result = false;
        if($this->db->connected) {
            $result = $this->db->execut_one_sql($query);
        }
        return $result;
    }

    public function update_user($id, $user_info = array()) {
        $query = 'UPDATE tb_user SET ';
        foreach($user_info as $key => $value) {
            if(empty($value)) continue;
            $query .= $key . "='". $value . "',";
        }

        $result = false;
        if($this->db->connected) {
            $query = trim($query, ',') . 'WHERE p_id = ' . $id;
            echo $query;
            $result = $this->db->execut_one_sql($query);
        }

        return $result;
    }
}