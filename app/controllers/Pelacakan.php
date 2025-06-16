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
        $data['pelacakan'] = $this->model('Pelacakan_model')->getByIdPaket($id_paket);
        $data['id_paket'] = $id_paket;
        $this->view('templates/header', $data);
        $this->view('pelacakan/index', $data);
        $this->view('templates/footer');
    }

    public function updateStatus()
    {
        $id_paket = $_POST['id_paket'];
        $status = $_POST['status_saat_ini'];
        $keterangan = $_POST['keterangan'];

        if ($this->model('Pelacakan_model')->updateStatusPaket($id_paket, $status, $keterangan)) {
            Flasher::setFlash('Status berhasil diperbarui', 'success');
        } else {
            Flasher::setFlash('Gagal memperbarui status', 'danger');
        }

        header('Location: ' . BASEURL . '/pelacakan');
        exit;
    }
}
