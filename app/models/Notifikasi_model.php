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
        $this->db->query("
        SELECT 'log_kota' AS sumber, id_log, aksi, tanggal, status FROM log_kota
        UNION ALL
        SELECT 'log_kurir' AS sumber, id_log, aksi, tanggal, status FROM log_kurir
        UNION ALL
        SELECT 'log_layanan' AS sumber, id_log, aksi, tanggal, status FROM log_layanan
        UNION ALL
        SELECT 'log_paket' AS sumber, id_log, aksi, tanggal, status FROM log_paket
        UNION ALL
        SELECT 'log_pelacakan' AS sumber, id_log, aksi, tanggal, status FROM log_pelacakan
        UNION ALL
        SELECT 'log_penerima' AS sumber, id_log, aksi, tanggal, status FROM log_penerima
        UNION ALL
        SELECT 'log_pengirim' AS sumber, id_log, aksi, tanggal, status FROM log_pengirim
        UNION ALL
        SELECT 'log_tarif' AS sumber, id_log, aksi, tanggal, status FROM log_tarif
        ORDER BY tanggal DESC
    ");
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
