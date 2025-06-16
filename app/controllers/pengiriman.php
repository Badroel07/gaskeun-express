<?php

class Pengiriman extends Controller
{
    public function index()
    {
        $data['judul'] = 'Input Pengiriman';
        $data['layanan'] = $this->model('Pengiriman_model')->getAllLayanan();
        $data['kota'] = $this->model('Pengiriman_model')->getAllKota();

        $this->view('templates/header', $data);
        $this->view('pengiriman/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Pengiriman_model')->tambahPengiriman($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pengiriman');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pengiriman');
            exit;
        }
    }

    public function getTarif()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idLayanan = $_POST['id_layanan'];
            $idKotaAsal = $_POST['id_kota_asal'];
            $idKotaTujuan = $_POST['id_kota_tujuan'];

            $this->model('Pengiriman_model')->getTarifPerKg($idLayanan, $idKotaAsal, $idKotaTujuan);
            $tarif = $this->model('Pengiriman_model')->getTarifPerKg($idLayanan, $idKotaAsal, $idKotaTujuan);
            echo json_encode($tarif);
        }
    }
}
