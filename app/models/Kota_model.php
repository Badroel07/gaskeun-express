<?php
// app/models/Kota_model.php

class Kota_model {
    private $table = 'kota'; // Nama tabel di database Anda
    private $db;             // Objek database

    public function __construct() {
        $this->db = new Database; // Inisialisasi koneksi database
    }

    // Mengambil semua data kota dari tabel
    public function getAllKota() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    // Mengambil data kota berdasarkan ID
    public function getKotaById($id) {
        // ASUMSI: Kolom primary key di tabel Anda adalah 'id_kota'
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_kota = :id');
        $this->db->bind('id', $id); // Bind ID yang diterima
        return $this->db->single();
    }

    // Menambah data kota baru ke tabel
    public function tambahDataKota($data) {
        // Mengakses data POST dengan operator null coalescing untuk menghindari "Undefined array key"
        $nama_kota = $data['nama_kota'] ?? '';
        $zona_kota = $data['zona_kota'] ?? '';

        $query = "INSERT INTO " . $this->table . " (nama_kota, zona_kota) VALUES (:nama_kota, :zona_kota)";
        $this->db->query($query);
        $this->db->bind('nama_kota', $nama_kota);
        $this->db->bind('zona_kota', $zona_kota);

        $this->db->execute(); // Jalankan query INSERT
        return $this->db->rowCount(); // Kembalikan jumlah baris yang terpengaruh
    }

    // Mengubah data kota yang sudah ada di tabel
    public function ubahDataKota($data) {
        // Mengakses data POST dengan operator null coalescing
        $nama_kota = $data['nama_kota'] ?? '';
        $zona_kota = $data['zona_kota'] ?? '';
        // ASUMSI: Nama input hidden untuk ID di form adalah 'id_kota'
        $id_kota = $data['id_kota'] ?? '';

        // ASUMSI: Kolom primary key di tabel Anda adalah 'id_kota'
        $query = "UPDATE " . $this->table . " SET
                    nama_kota = :nama_kota,
                    zona_kota = :zona_kota
                  WHERE id_kota = :id_kota"; // Perbarui berdasarkan id_kota

        $this->db->query($query);
        $this->db->bind('nama_kota', $nama_kota);
        $this->db->bind('zona_kota', $zona_kota);
        $this->db->bind('id_kota', $id_kota); // Bind ID untuk WHERE clause

        $this->db->execute(); // Jalankan query UPDATE
        return $this->db->rowCount(); // Kembalikan jumlah baris yang terpengaruh
    }

    // Menghapus data kota dari tabel
    public function hapusDataKota($id) {
        // ASUMSI: Kolom primary key di tabel Anda adalah 'id_kota'
        $query = "DELETE FROM " . $this->table . " WHERE id_kota = :id";
        $this->db->query($query);
        $this->db->bind('id', $id); // Bind ID yang diterima

        $this->db->execute(); // Jalankan query DELETE
        return $this->db->rowCount(); // Kembalikan jumlah baris yang terpengaruh
    }
}