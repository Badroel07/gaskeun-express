<?php

class Notifikasi_model {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllNotifikasi() {
        $this->db->query('SELECT * FROM semua_log ORDER BY tanggal DESC');
        return $this->db->resultSet();
    }
}