<?php
defined('BASEPATH') or exit('No direct script access allowed');

Class M_Login extends CI_Model
{
    function get_log($table,$data)
    {
        $sql = "SELECT * FROM $table WHERE userID = ?";
        $hasil = $this->db->query($sql,$data);
        return $hasil;
    }

    function auth($table,$data)
    {
        $sql = "SELECT * FROM $table WHERE userName = ? AND userPassword=?";
        $hasil = $this->db->query($sql,$data);
        return $hasil;
    }
}