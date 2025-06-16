<?php
class Kurir extends Controller {
    // Tampilkan daftar semua kurir
    public function index() {
        $data['judul'] = 'Daftar Kurir';
        $data['kurir'] = $this->model('Kurir_model')->getAllKurir();

        $this->view('templates/header', $data);
        $this->view('kurir/index', $data);
        $this->view('templates/footer');
    }

    // Tambah data kurir baru
    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Kurir_model')->tambahDataKurir($_POST) > 0) {
                header('Location: ' . BASEURL . '/kurir');
                exit;
            } else {
                header('Location: ' . BASEURL . '/kurir');
                exit;
            }
        } else {
            header('Location: ' . BASEURL . '/kurir');
            exit;
        }
    }

    // Ambil data kurir untuk diubah (via AJAX)
    public function getUbah() {
        $id = isset($_POST['id']) ? filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT) : null;
        if ($id) {
            echo json_encode($this->model('Kurir_model')->getKurirById($id));
        } else {
            echo json_encode(['error' => 'ID tidak disediakan']);
        }
    }

    // Proses ubah data kurir
    public function ubah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Kurir_model')->ubahDataKurir($_POST) > 0) {
                header('Location: ' . BASEURL . '/kurir');
                exit;
            } else {
                header('Location: ' . BASEURL . '/kurir');
                exit;
            }
        } else {
            header('Location: ' . BASEURL . '/kurir');
            exit;
        }
    }

    // Hapus data kurir
    public function hapus($id) {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        try {
            if ($this->model('Kurir_model')->hapusDataKurir($id) > 0) {
                header('Location: ' . BASEURL . '/kurir');
                exit;
            } else {
                echo "Data kurir gagal dihapus.";
            }
        } catch (Exception $e) {
            echo "<script>alert('Gagal menghapus: data ini masih digunakan di tabel lain!'); window.location.href = '" . BASEURL . "/kurir';</script>";
        }
    }
}
