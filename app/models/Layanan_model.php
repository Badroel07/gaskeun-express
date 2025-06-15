<?php
// app/models/Layanan_model.php

class Layanan_model {
    private $table = 'layanan'; // Nama tabel di database Anda
    private $db;             // Objek database

    public function __construct() {
        $this->db = new Database; // Inisialisasi koneksi database
    }

    // Mengambil semua data layanan dari tabel
    public function getAllLayanan() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    // Mengambil data layanan berdasarkan ID
    public function getLayananById($id) {
        // ASUMSI: Kolom primary key di tabel Anda adalah 'id_layanan'
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_layanan = :id');
        $this->db->bind('id', $id); // Bind ID yang diterima
        return $this->db->single();
    }

    // Menambah data layanan baru ke tabel
    public function tambahDataLayanan($data) {
        // Mengakses data POST dengan operator null coalescing untuk menghindari "Undefined array key"
        $nama_layanan = $data['nama_layanan'] ?? '';
        $deskripsi_layanan = $data['deskripsi_layanan'] ?? '';

        $query = "INSERT INTO " . $this->table . " (nama_layanan, deskripsi_layanan) VALUES (:nama_layanan, :deskripsi_layanan)";
        $this->db->query($query);
        $this->db->bind('nama_layanan', $nama_layanan);
        $this->db->bind('deskripsi_layanan', $deskripsi_layanan);

        $this->db->execute(); // Jalankan query INSERT
        return $this->db->rowCount(); // Kembalikan jumlah baris yang terpengaruh
    }

    // Mengubah data layanan yang sudah ada di tabel
    public function ubahDataLayanan($data) {
        // Mengakses data POST dengan operator null coalescing
        $nama_layanan = $data['nama_layanan'] ?? '';
        $deskripsi_layanan = $data['deskripsi_layanan'] ?? '';
        // ASUMSI: Nama input hidden untuk ID di form adalah 'id_layanan'
        $id_layanan = $data['id_layanan'] ?? '';

        // ASUMSI: Kolom primary key di tabel Anda adalah 'id_layanan'
        $query = "UPDATE " . $this->table . " SET
                    nama_layanan = :nama_layanan,
                    deskripsi_layanan = :deskripsi_layanan
                  WHERE id_layanan = :id_layanan"; // Perbarui berdasarkan id_layanan

        $this->db->query($query);
        $this->db->bind('nama_layanan', $nama_layanan);
        $this->db->bind('deskripsi_layanan', $deskripsi_layanan);
        $this->db->bind('id_layanan', $id_layanan); // Bind ID untuk WHERE clause

        $this->db->execute(); // Jalankan query UPDATE
        return $this->db->rowCount(); // Kembalikan jumlah baris yang terpengaruh
    }

    // Menghapus data layanan dari tabel
    public function hapusDataLayanan($id) {
        // ASUMSI: Kolom primary key di tabel Anda adalah 'id_layanan'
        $query = "DELETE FROM " . $this->table . " WHERE id_layanan = :id";
        $this->db->query($query);
        $this->db->bind('id', $id); // Bind ID yang diterima

        $this->db->execute(); // Jalankan query DELETE
        return $this->db->rowCount(); // Kembalikan jumlah baris yang terpengaruh
    }
}