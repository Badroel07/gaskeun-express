<?php

class Pengiriman extends Controller {
    public function index() {
        $data['judul'] = 'Input Pengiriman';
        $data['layanan'] = $this->model('Pengiriman_model')->getAllLayanan();
        $data['kota'] = $this->model('Pengiriman_model')->getAllKota();
        
        $this->view('templates/header', $data);
        $this->view('pengiriman/index', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
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
}