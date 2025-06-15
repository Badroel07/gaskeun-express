<?php
// app/controllers/Tarif.php

class Tarif extends Controller {
    // Metode default saat mengakses /tarif
    public function index() {
        $data['judul'] = 'Daftar Tarif';
        $data['tarif'] = $this->model('Tarif_model')->getAllTarif();
        
        // Ambil semua data kota dan layanan untuk kebutuhan form (tambah/ubah)
        $data['kota'] = $this->model('Kota_model')->getAllKota();
        $data['layanan'] = $this->model('Layanan_model')->getAllLayanan();

        $this->view('templates/header', $data);
        $this->view('tarif/index', $data);
        $this->view('templates/footer');
    }

    // Menangani penambahan data tarif baru
    public function tambah() {
        // Pastikan permintaan adalah POST (dari pengiriman form)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Tarif_model')->tambahDataTarif($_POST) > 0) {
                // Contoh pesan flash (jika Anda memiliki sistem flasher)
                // Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/tarif'); // Redirect ke halaman daftar tarif
                exit;
            } else {
                // Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/tarif');
                exit;
            }
        } else {
            // Jika bukan POST request, arahkan kembali
            header('Location: ' . BASEURL . '/tarif');
            exit;
        }
    }

    // Mengambil data tarif untuk diubah (via AJAX)
    public function getUbah() {
        // Mengambil ID dari POST request dan sanitasi
        $id = isset($_POST['id']) ? filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT) : null;
        if ($id) {
            // Mengembalikan data tarif dalam format JSON
            echo json_encode($this->model('Tarif_model')->getTarifById($id));
        } else {
            echo json_encode(['error' => 'ID tidak disediakan']);
        }
    }

    // Menangani perubahan data tarif
    public function ubah() {
        // Ensure the request method is POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize and validate input data
            $data = [
                'id_tarif' => filter_var($_POST['id_tarif'], FILTER_SANITIZE_NUMBER_INT),
                'id_kota_asal' => filter_var($_POST['id_kota_asal'], FILTER_SANITIZE_NUMBER_INT),
                'id_kota_tujuan' => filter_var($_POST['id_kota_tujuan'], FILTER_SANITIZE_NUMBER_INT),
                'id_layanan' => filter_var($_POST['id_layanan'], FILTER_SANITIZE_NUMBER_INT),
                'tarif_per_kg' => filter_var($_POST['tarif_per_kg'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)
            ];

            // Update the data using the model
            if ($this->model('Tarif_model')->ubahDataTarif($data) > 0) {
                // Flasher::setFlash('berhasil', 'diubah', 'success');
                header('Location: ' . BASEURL . '/tarif');
                exit;
            } else {
                // Flasher::setFlash('gagal', 'diubah', 'danger');
                header('Location: ' . BASEURL . '/tarif');
                exit;
            }
        } else {
            header('Location: ' . BASEURL . '/tarif');
            exit;
        }
    }

    // Menangani penghapusan data tarif
    public function hapus($id) {
        // Sanitasi ID yang diterima dari URL
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        if ($this->model('Tarif_model')->hapusDataTarif($id) > 0) {
            // Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/tarif');
            exit;
        } else {
            // Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/tarif');
            exit;
        }
    }
}