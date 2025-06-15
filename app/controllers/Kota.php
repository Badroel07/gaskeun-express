<?php

class Kota extends Controller {
    public function index() {
        $data['judul'] = 'Daftar Kota';
        $data['kota'] = $this->model('Kota_model')->getAllKota();

        $this->view('templates/header', $data);
        $this->view('kota/index', $data);
        $this->view('templates/footer');
    }

    public function getAll() {
        $kota = $this->model('Kota_model')->getAllKota();
        echo json_encode($kota);
    }
}
