<?php

class Pelacakan extends Controller
{
    public function index()
    {
        $data['judul'] = 'Pelacakan';
        $data['pelacakan'] = $this->model('Pelacakan_model')->getAllPelacakan();
        $this->view('templates/header', $data);
        $this->view('pelacakan/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $id_paket = $_POST['tracking_id']; // ambil dari form
        $data['judul'] = 'Hasil Pelacakan';

        $pelacakanModel = $this->model('Pelacakan_model');
        $data['pelacakan'] = $pelacakanModel->getByIdPaket($id_paket);
        $data['id_paket'] = $id_paket;
        $data['kurirList'] = $pelacakanModel->getAllKurir();

        // Cek apakah pelacakan ditemukan dan id_kurir tersedia
        if (!empty($data['pelacakan']) && isset($data['pelacakan']['id_kurir'])) {
            $data['id_kurir'] = $data['pelacakan']['id_kurir'];
        } else {
            $data['id_kurir'] = '';
        }

        $this->view('templates/header', $data);
        $this->view('pelacakan/index', $data);
        $this->view('templates/footer');
    }

    public function updateStatus()
    {
        $id_paket = $_POST['id_paket'];
        $status = $_POST['status_saat_ini'];
        $keterangan = $_POST['keterangan'];
        $id_kurir = $_POST['id_kurir'];

        if ($this->model('Pelacakan_model')->updateStatusPaket($id_paket, $status, $keterangan, $id_kurir)) {
            Flasher::setFlash('Status berhasil diperbarui', 'success');
        } else {
            Flasher::setFlash('Gagal memperbarui status', 'danger');
        }

        header('Location: ' . BASEURL . '/pelacakan');
        exit;
    }
}
