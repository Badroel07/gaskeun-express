<?php

class Laporan extends Controller
{
    public function index()
    {
        $data['judul'] = 'Laporan Pengiriman';
        $laporanModel = $this->model('Laporan_model');
        $kotaModel = $this->model('Kota_model');

        // Fix URL parameter capture
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        parse_str($url ?? '', $params);

        $kota_tujuan = isset($params['kota_tujuan']) && $params['kota_tujuan'] !== 'Semua Kota' ? $params['kota_tujuan'] : '';
        $status = isset($params['status']) && $params['status'] !== 'Semua Status' ? $params['status'] : '';

        // Get data based on filters
        $data['laporan'] = $laporanModel->getFilteredLaporan($kota_tujuan, $status);
        $data['kota'] = $kotaModel->getAllKota();
        $data['selected_kota'] = $kota_tujuan;
        $data['selected_status'] = $status;

        $this->view('templates/header', $data);
        $this->view('laporan/index', $data);
        $this->view('templates/footer');
    }

    public function hapusSemua() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model('Laporan_model')->hapusSemua();
            header('Location: ' . BASEURL . '/laporan');
            exit;
        } else {
            header('Location: ' . BASEURL . '/laporan');
            exit;
        }
    }
}
