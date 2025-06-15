<?php
// app/models/Tarif_model.php

class Tarif_model {
    private $table = 'tarif';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Ambil semua data tarif + join kota asal, kota tujuan, dan layanan
    public function getAllTarif() {
        $query = "SELECT 
                    t.id_tarif,
                    t.tarif_per_kg,
                    asal.nama_kota AS nama_kota_asal,
                    tujuan.nama_kota AS nama_kota_tujuan,
                    l.nama_layanan
                  FROM {$this->table} t
                  JOIN kota asal ON t.id_kota_asal = asal.id_kota
                  JOIN kota tujuan ON t.id_kota_tujuan = tujuan.id_kota
                  JOIN layanan l ON t.id_layanan = l.id_layanan";

        $this->db->query($query);
        return $this->db->resultSet();
    }

    // Ambil satu data tarif berdasarkan ID
    public function getTarifById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id_tarif = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // Tambah data tarif baru
    public function tambahDataTarif($data) {
        $query = "INSERT INTO {$this->table} 
                  (id_kota_asal, id_kota_tujuan, id_layanan, tarif_per_kg)
                  VALUES 
                  (:id_kota_asal, :id_kota_tujuan, :id_layanan, :tarif_per_kg)";

        $this->db->query($query);
        $this->db->bind('id_kota_asal', $data['id_kota_asal'] ?? null);
        $this->db->bind('id_kota_tujuan', $data['id_kota_tujuan'] ?? null);
        $this->db->bind('id_layanan', $data['id_layanan'] ?? null);
        $this->db->bind('tarif_per_kg', $data['tarif_per_kg'] ?? 0);

        $this->db->execute();
        return $this->db->rowCount();
    }

    // Ubah data tarif
    public function ubahDataTarif($data) {
        $query = "UPDATE {$this->table} SET
                    id_kota_asal = :id_kota_asal,
                    id_kota_tujuan = :id_kota_tujuan,
                    id_layanan = :id_layanan,
                    tarif_per_kg = :tarif_per_kg
                  WHERE id_tarif = :id_tarif";

        $this->db->query($query);
        $this->db->bind('id_kota_asal', $data['id_kota_asal'] ?? null);
        $this->db->bind('id_kota_tujuan', $data['id_kota_tujuan'] ?? null);
        $this->db->bind('id_layanan', $data['id_layanan'] ?? null);
        $this->db->bind('tarif_per_kg', $data['tarif_per_kg'] ?? 0);
        $this->db->bind('id_tarif', $data['id_tarif'] ?? null);

        $this->db->execute();
        return $this->db->rowCount();
    }

    // Hapus data tarif
    public function hapusDataTarif($id) {
        $query = "DELETE FROM {$this->table} WHERE id_tarif = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
