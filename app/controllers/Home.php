<?php

class Home extends Controller {
    public function index() {
        $data['judul'] = 'Home';
        $data['dashboard'] = $this->model('Dashboard_model')->getAllDashboard();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}