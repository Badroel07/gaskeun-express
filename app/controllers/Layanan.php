<?php
// app/controllers/Layanan.php

class Layanan extends Controller {
    // Metode default saat mengakses /layanan
    public function index() {
        $data['judul'] = 'Daftar Layanan';
        $data['layanan'] = $this->model('Layanan_model')->getAllLayanan();

        $this->view('templates/header', $data);
        $this->view('layanan/index', $data);
        $this->view('templates/footer');
    }

    // Menangani penambahan data layanan baru
    public function tambah() {
        // Pastikan permintaan adalah POST (dari pengiriman form)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Layanan_model')->tambahDataLayanan($_POST) > 0) {
                // Contoh pesan flash (jika Anda memiliki sistem flasher)
                // Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/layanan'); // Redirect ke halaman daftar layanan
                exit;
            } else {
                // Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/layanan');
                exit;
            }
        } else {
            // Jika bukan POST request, arahkan kembali
            header('Location: ' . BASEURL . '/layanan');
            exit;
        }
    }

    // Mengambil data layanan untuk diubah (via AJAX)
    public function getUbah() {
        // Mengambil ID dari POST request dan sanitasi
        $id = isset($_POST['id']) ? filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT) : null;
        if ($id) {
            // Mengembalikan data layanan dalam format JSON
            echo json_encode($this->model('Layanan_model')->getLayananById($id));
        } else {
            echo json_encode(['error' => 'ID tidak disediakan']);
        }
    }

    // Menangani perubahan data layanan
    public function ubah() {
        // Pastikan permintaan adalah POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Layanan_model')->ubahDataLayanan($_POST) > 0) {
                // Flasher::setFlash('berhasil', 'diubah', 'success');
                header('Location: ' . BASEURL . '/layanan');
                exit;
            } else {
                // Flasher::setFlash('gagal', 'diubah', 'danger');
                header('Location: ' . BASEURL . '/layanan');
                exit;
            }
        } else {
            header('Location: ' . BASEURL . '/layanan');
            exit;
        }
    }

    // Menangani penghapusan data layanan
    public function hapus($id) {
        // Sanitasi ID yang diterima dari URL
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        if ($this->model('Layanan_model')->hapusDataLayanan($id) > 0) {
            // Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/layanan');
            exit;
        } else {
            // Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/layanan');
            exit;
        }
    }
}