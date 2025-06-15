<?php

class Kota_model {
    private $table = 'kota';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllKota() {
        $this->db->query("SELECT * FROM " . $this->table . " ORDER BY nama_kota ASC");
        return $this->db->resultSet();
    }

    public function getKotaById($id_kota) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_kota = :id");
        $this->db->bind('id', $id_kota);
        return $this->db->single();
    }
}
