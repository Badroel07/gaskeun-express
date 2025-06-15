<?php

class Pelacakan_model
{
    private $table = 'pelacakan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPelacakan()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getByIdPaket($id_paket)
    {
        $this->db->query("SELECT 
                            pel.id_pelacakan,
                            pel.id_paket,
                            peng.nama_pengirim,
                            pener.nama_penerima,
                            kota_asal.nama_kota AS kota_asal,
                            kota_tujuan.nama_kota AS kota_tujuan,
                            p.berat_paket,
                            p.ongkos_kirim,
                            l.nama_layanan AS layanan,
                            pel.tanggal_update,
                            pel.status_saat_ini,
                            pel.keterangan,
                            kur.nama_kurir
                        FROM pelacakan pel
                        LEFT JOIN paket p ON pel.id_paket = p.id_paket
                        LEFT JOIN pengirim peng ON p.id_pengirim = peng.id_pengirim
                        LEFT JOIN layanan l ON p.id_layanan = l.id_layanan
                        LEFT JOIN kurir kur ON pel.id_kurir = kur.id_kurir
                        LEFT JOIN penerima pener ON p.id_penerima = pener.id_penerima
                        LEFT JOIN kota kota_asal ON p.id_kota_asal = kota_asal.id_kota
                        LEFT JOIN kota kota_tujuan ON p.id_kota_tujuan = kota_tujuan.id_kota
                        WHERE pel.id_paket = :id_paket");
        $this->db->bind('id_paket', $id_paket);
        return $this->db->resultSet(); // gunakan ->single() jika hanya ambil 1
    }

    public function updateStatusPaket($id_paket, $status)
    {
        $this->db->query("UPDATE pelacakan SET status_saat_ini = :status WHERE id_paket = :id_paket");
        $this->db->bind('status', $status);
        $this->db->bind('id_paket', $id_paket);

        return $this->db->execute();
    }
}
