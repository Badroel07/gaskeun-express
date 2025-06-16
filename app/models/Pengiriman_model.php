<?php

class Pengiriman_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllLayanan()
    {
        $this->db->query('SELECT * FROM layanan');
        return $this->db->resultSet();
    }

    public function getAllKota()
    {
        $this->db->query('SELECT * FROM kota');
        return $this->db->resultSet();
    }

    public function tambahPengiriman($data)
    {
        // Insert pengirim
        $this->db->query('INSERT INTO pengirim (nama_pengirim, alamat_pengirim, telepon_pengirim) 
                         VALUES (:nama, :alamat, :telepon)');
        $this->db->bind('nama', $data['senderName']);
        $this->db->bind('alamat', $data['senderAddress']);
        $this->db->bind('telepon', $data['senderPhone']);
        $this->db->execute();
        $idPengirim = $this->db->lastInsertId();

        // Insert penerima
        $this->db->query('INSERT INTO penerima (nama_penerima, alamat_penerima, telepon_penerima, kota_penerima) 
                         VALUES (:nama, :alamat, :telepon, :kota)');
        $this->db->bind('nama', $data['receiverName']);
        $this->db->bind('alamat', $data['receiverAddress']);
        $this->db->bind('telepon', $data['receiverPhone']);
        $this->db->bind('kota', $data['destinationCity']);
        $this->db->execute();
        $idPenerima = $this->db->lastInsertId();

        // Generate a unique id_paket using a combination of timestamp and random number
        $idPaket = 'PKT-' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 8));

        // Calculate ongkos from tarif table
        $this->db->query('SELECT tarif_per_kg FROM tarif WHERE id_kota_asal = :kota_asal AND id_kota_tujuan = :kota_tujuan AND id_layanan = :layanan');
        $this->db->bind('kota_asal', $data['originCity']);
        $this->db->bind('kota_tujuan', $data['destinationCity']);
        $this->db->bind('layanan', $data['serviceType']);
        $tarif = $this->db->single();
        $ongkos = isset($tarif['tarif_per_kg']) ? $tarif['tarif_per_kg'] * $data['packageWeight'] : 0;

        // Insert paket
        $this->db->query('INSERT INTO paket (id_paket, id_pengirim, id_penerima, id_kota_asal, id_kota_tujuan, id_layanan, berat_paket, ongkos_kirim) 
                         VALUES (:id_paket, :id_pengirim, :id_penerima, :kota_asal, :kota_tujuan, :layanan, :berat, :ongkos)');
        $this->db->bind('id_paket', $idPaket);
        $this->db->bind('id_pengirim', $idPengirim);
        $this->db->bind('id_penerima', $idPenerima);
        $this->db->bind('kota_asal', $data['originCity']);
        $this->db->bind('kota_tujuan', $data['destinationCity']);
        $this->db->bind('layanan', $data['serviceType']);
        $this->db->bind('berat', $data['packageWeight']);
        $this->db->bind('ongkos', $ongkos);
        $this->db->execute();

        // Insert into pelacakan
        $this->db->query('INSERT INTO pelacakan (id_paket, status_saat_ini) VALUES (:id_paket, :status)');
        $this->db->bind('id_paket', $idPaket);
        $this->db->bind('status', 'Created');
        return $this->db->execute();
    }

    public function getTarifPerKg($idLayanan, $idKotaAsal, $idKotaTujuan)
    {
        $this->db->query("SELECT tarif_per_kg FROM tarif WHERE id_layanan = :layanan AND id_kota_asal = :asal AND id_kota_tujuan = :tujuan");
        $this->db->bind('layanan', $idLayanan);
        $this->db->bind('asal', $idKotaAsal);
        $this->db->bind('tujuan', $idKotaTujuan);
        return $this->db->single();
    }
}
