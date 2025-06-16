<?php
class Kurir_model {
    private $table = 'kurir';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Mengambil semua data kurir
    public function getAllKurir() {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    // Mengambil data kurir berdasarkan ID
    public function getKurirById($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_kurir = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // Menambah data kurir
    public function tambahDataKurir($data) {
        $nama_kurir = $data['nama_kurir'] ?? '';
        $telepon_kurir = $data['telepon_kurir'] ?? '';

        $query = "INSERT INTO " . $this->table . " (nama_kurir, telepon_kurir) 
                  VALUES (:nama_kurir, :telepon_kurir)";
        $this->db->query($query);
        $this->db->bind('nama_kurir', $nama_kurir);
        $this->db->bind('telepon_kurir', $telepon_kurir);

        $this->db->execute();
        return $this->db->rowCount();
    }

    // Mengubah data kurir
    public function ubahDataKurir($data) {
        $id_kurir = $data['id_kurir'] ?? '';
        $nama_kurir = $data['nama_kurir'] ?? '';
        $telepon_kurir = $data['telepon_kurir'] ?? '';

        $query = "UPDATE " . $this->table . " 
                  SET nama_kurir = :nama_kurir, 
                      telepon_kurir = :telepon_kurir 
                  WHERE id_kurir = :id_kurir";
        $this->db->query($query);
        $this->db->bind('nama_kurir', $nama_kurir);
        $this->db->bind('telepon_kurir', $telepon_kurir);
        $this->db->bind('id_kurir', $id_kurir);

        $this->db->execute();
        return $this->db->rowCount();
    }

    // Menghapus data kurir
    public function hapusDataKurir($id) {
        $this->db->query("DELETE FROM " . $this->table . " WHERE id_kurir = :id");
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
