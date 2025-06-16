<?php

class Notifikasi_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllNotifikasi()
    {
        $this->db->query('SELECT * FROM semua_log ORDER BY tanggal DESC');
        return $this->db->resultSet();
    }

    public function hapusSemua()
    {
        $this->db->query("DELETE FROM log_kota");
        $this->db->execute();

        $this->db->query("DELETE FROM log_kurir");
        $this->db->execute();

        $this->db->query("DELETE FROM log_layanan");
        $this->db->execute();

        $this->db->query("DELETE FROM log_paket");
        $this->db->execute();

        $this->db->query("DELETE FROM log_pelacakan");
        $this->db->execute();

        $this->db->query("DELETE FROM log_penerima");
        $this->db->execute();

        $this->db->query("DELETE FROM log_pengirim");
        $this->db->execute();

        $this->db->query("DELETE FROM log_tarif");
        $this->db->execute();

        return true;
    }
}
