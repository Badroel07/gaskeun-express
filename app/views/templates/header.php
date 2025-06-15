<?php
$current_page = basename($_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul'] ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .hover-bg:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body class="flex min-h-screen bg-gray-100">
    <aside id="sidebar" class="d-lg-block d-none bg-dark text-white vh-100 position-fixed" style="width: 260px; z-index: 1040;">
        <div class="d-flex align-items-center justify-content-center border-bottom p-4">
            <img src="<?= BASEURL ?>/images/logo.jpg" alt="Expedition Logo" class="rounded-circle me-2" width="40" height="40">
            <span class="fs-5 fw-semibold text-white">ExpeditionCo</span>
        </div>

        <nav class="nav flex-column p-3">
            <a href="<?= BASEURL ?>/home" class="nav-link text-white <?= $current_page == 'home' ? 'bg-secondary' : 'hover-bg' ?> rounded mb-2">
                <i class="bi bi-house me-2"></i> Dashboard
            </a>
            <a href="<?= BASEURL ?>/pelacakan" class="nav-link text-white <?= $current_page == 'pelacakan' ? 'bg-secondary' : 'hover-bg' ?> rounded mb-2">
                <i class="bi bi-search me-2"></i> Lacak Paket
            </a>
            <a href="<?= BASEURL ?>/pengiriman" class="nav-link text-white <?= $current_page == 'pengiriman' ? 'bg-secondary' : 'hover-bg' ?> rounded mb-2">
                <i class="bi bi-box me-2"></i> New Order
            </a>
            <a href="<?= BASEURL ?>/laporan" class="nav-link text-white <?= $current_page == 'laporan' ? 'bg-secondary' : 'hover-bg' ?> rounded mb-2">
                <i class="bi bi-bar-chart-line me-2"></i> Reports
            </a>
            <a href="<?= BASEURL ?>/kota" class="nav-link text-white <?= $current_page == 'kota' ? 'bg-secondary' : 'hover-bg' ?> rounded mb-2">
                <i class="bi bi-geo-alt me-2"></i> Kota
            </a>
            <a href="<?= BASEURL ?>/tarif" class="nav-link text-white <?= $current_page == 'tarif' ? 'bg-secondary' : 'hover-bg' ?> rounded mb-2">
                <i class="bi bi-currency-dollar me-2"></i> Tarif
            </a>
            <a href="<?= BASEURL ?>/layanan" class="nav-link text-white <?= $current_page == 'layanan' ? 'bg-secondary' : 'hover-bg' ?> rounded mb-2">
                <i class="bi bi-tools me-2"></i> Layanan
            </a>
            <a href="<?= BASEURL ?>/notifikasi" class="nav-link text-white <?= $current_page == 'notifikasi' ? 'bg-secondary' : 'hover-bg' ?> rounded mb-2">
                <i class="bi bi-bell me-2"></i> Log Riwayat
            </a>
        </nav>
    </aside>


    <main class="flex-1 overflow-y-auto p-6 lg:p-10 lg:ml-64">