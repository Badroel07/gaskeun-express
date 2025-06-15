<?php

class Pengiriman extends Controller {
    public function index() {
        $data['judul'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('pengiriman/index');
        $this->view('templates/footer');
    }
}