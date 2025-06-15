<?php
// app/controllers/Kota.php

class Kota extends Controller {
    // Metode default saat mengakses /kota
    public function index() {
        $data['judul'] = 'Daftar Kota';
        $data['kota'] = $this->model('Kota_model')->getAllKota();

        $this->view('templates/header', $data);
        $this->view('kota/index', $data);
        $this->view('templates/footer');
    }

    // Menangani penambahan data kota baru
    public function tambah() {
        // Pastikan permintaan adalah POST (dari pengiriman form)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Kota_model')->tambahDataKota($_POST) > 0) {
                // Contoh pesan flash (jika Anda memiliki sistem flasher)
                // Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/kota'); // Redirect ke halaman daftar kota
                exit;
            } else {
                // Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/kota');
                exit;
            }
        } else {
            // Jika bukan POST request, arahkan kembali
            header('Location: ' . BASEURL . '/kota');
            exit;
        }
    }

    // Mengambil data kota untuk diubah (via AJAX)
    public function getUbah() {
        // Mengambil ID dari POST request dan sanitasi
        $id = isset($_POST['id']) ? filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT) : null;
        if ($id) {
            // Mengembalikan data kota dalam format JSON
            echo json_encode($this->model('Kota_model')->getKotaById($id));
        } else {
            echo json_encode(['error' => 'ID tidak disediakan']);
        }
    }

    // Menangani perubahan data kota
    public function ubah() {
        // Pastikan permintaan adalah POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Kota_model')->ubahDataKota($_POST) > 0) {
                // Flasher::setFlash('berhasil', 'diubah', 'success');
                header('Location: ' . BASEURL . '/kota');
                exit;
            } else {
                // Flasher::setFlash('gagal', 'diubah', 'danger');
                header('Location: ' . BASEURL . '/kota');
                exit;
            }
        } else {
            header('Location: ' . BASEURL . '/kota');
            exit;
        }
    }

    // Menangani penghapusan data kota
    public function hapus($id) {
        // Sanitasi ID yang diterima dari URL
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        if ($this->model('Kota_model')->hapusDataKota($id) > 0) {
            // Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/kota');
            exit;
        } else {
            // Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/kota');
            exit;
        }
    }
}