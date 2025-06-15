<?php

class Laporan extends Controller
{
    public function index()
    {
        $data['judul'] = 'Laporan Pengiriman';
        $laporanModel = $this->model('Laporan_model');
        $kotaModel = $this->model('Kota_model');

        // Get filter values
        $kota_tujuan = isset($_GET['kota_tujuan']) ? $_GET['kota_tujuan'] : '';
        $status = isset($_GET['status']) ? $_GET['status'] : '';

        // Get data based on filters
        if (!empty($kota_tujuan) || !empty($status)) {
            $data['laporan'] = $laporanModel->getFilteredLaporan($kota_tujuan, $status);
        } else {
            $data['laporan'] = $laporanModel->getAllLaporan();
        }

        $data['kota'] = $kotaModel->getAllKota();
        $data['selected_kota'] = $kota_tujuan;
        $data['selected_status'] = $status;

        $this->view('templates/header', $data);
        $this->view('laporan/index', $data);
        $this->view('templates/footer');
    }
}
