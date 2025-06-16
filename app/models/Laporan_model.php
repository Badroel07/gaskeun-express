<?php

class Laporan_model
{
    private $table = 'laporan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllLaporan()
    {
        $this->db->query("SELECT * FROM " . $this->table . " ORDER BY tanggal DESC");
        return $this->db->resultSet();
    }

    public function getFilteredLaporan($kota_tujuan = '', $status = '')
    {
        $query = "SELECT * FROM " . $this->table . " WHERE 1=1";
        
        if (!empty($kota_tujuan)) {
            $query .= " AND kota_tujuan = :kota_tujuan";
        }
        
        if (!empty($status)) {
            $query .= " AND status = :status";
        }
        
        $query .= " ORDER BY tanggal DESC";
        
        $this->db->query($query);
        
        if (!empty($kota_tujuan)) {
            $this->db->bind('kota_tujuan', $kota_tujuan);
        }
        
        if (!empty($status)) {
            $this->db->bind('status', $status);
        }
        
        return $this->db->resultSet();
    }

    public function hapusSemua(){
        $this->db->query("DELETE FROM paket");
        $this->db->execute();
        return true;
    }
}
