<?php

class Notifikasi extends Controller {
    public function index() {
        $data['judul'] = 'Notifikasi';
        $data['notifikasi'] = $this->model('Notifikasi_model')->getAllNotifikasi();
        $this->view('templates/header', $data);
        $this->view('notifikasi/index', $data);
        $this->view('templates/footer');
    }

    public function hapusSemua() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model('Notifikasi_model')->hapusSemua();
            header('Location: ' . BASEURL . '/notifikasi');
            exit;
        } else {
            header('Location: ' . BASEURL . '/notifikasi');
            exit;
        }
    }
}