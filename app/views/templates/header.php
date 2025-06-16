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
    <link rel="icon" type="image/png" href="<?= BASEURL ?>/images/favicon.png">
    <style>
        /* Main Sidebar Styling */
        #sidebar {
            background: linear-gradient(180deg, #2c3e50 0%, #202b38 100%);
            /* Darker, subtle gradient */
            box-shadow: 6px 0 15px rgba(0, 0, 0, 0.4);
            /* More pronounced shadow */
            transition: all 0.3s ease-in-out;
        }

        /* Header Styling */
        .sidebar-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            /* Lighter, subtle border */
            margin-bottom: 1rem;
        }

        .text-shadow-glow {
            text-shadow: 0 0 8px rgba(255, 255, 255, 0.5);
            /* Subtle glow effect for text */
        }

        /* Navigation Link Styling */
        .sidebar-link {
            color: #e0e0e0;
            /* Lighter text for better contrast on dark background */
            transition: background-color 0.3s ease, transform 0.2s ease;
            position: relative;
            /* For the active indicator */
            overflow: hidden;
            /* Hide overflow for animation */
        }

        .sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.08);
            /* Slightly more visible hover */
            transform: translateX(5px);
            /* Subtle slide on hover */
            color: #ffffff;
            /* Brighter text on hover */
        }

        /* Active Link Styling */
        .active-sidebar-link {
            background: linear-gradient(90deg, #007bff, #0056b3);
            /* Primary blue gradient */
            color: #ffffff;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.4);
            /* Stronger shadow for active */
            transform: translateX(5px);
            /* Push active link slightly */
            position: relative;
            overflow: hidden;
            /* For the subtle shine effect */
        }

        .active-sidebar-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            /* Subtle shine effect */
            transform: skewX(-20deg);
            transition: transform 0.5s ease-out;
        }

        .active-sidebar-link:hover::before {
            transform: skewX(-20deg) translateX(200%);
            /* Animate shine on hover */
        }

        .active-sidebar-link::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            width: 6px;
            /* Indicator bar width */
            height: 80%;
            background-color: #ffffff;
            /* White indicator bar */
            border-radius: 3px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
        }

        /* Icon styling for better alignment and impact */
        .sidebar-link i {
            min-width: 24px;
            /* Ensure consistent icon alignment */
            text-align: center;
        }
    </style>
</head>

<body class="flex min-h-screen bg-gray-100">
    <aside id="sidebar" class="d-lg-block d-none vh-100 position-fixed" style="width: 260px; z-index: 1040;">
        <div class="sidebar-header d-flex align-items-center justify-content-center p-4">
            <img src="<?= BASEURL ?>/images/logo.png" alt="Expedition Logo" class="rounded-circle me-3 border border-light p-1" width="45" height="45">
            <span class="fs-4 fw-bold text-white text-shadow-glow">Gaskeun Express</span>
        </div>

        <nav class="nav flex-column p-3">
            <a href="<?= BASEURL ?>/home" class="nav-link rounded py-2 mb-2 d-flex align-items-center sidebar-link
            <?= $current_page == 'home' ? 'active-sidebar-link' : '' ?>">
                <i class="bi bi-house me-3 fs-5"></i> <span class="fw-medium">Dashboard</span>
            </a>
            <a href="<?= BASEURL ?>/pelacakan" class="nav-link rounded py-2 mb-2 d-flex align-items-center sidebar-link
            <?= $current_page == 'pelacakan' ? 'active-sidebar-link' : '' ?>">
                <i class="bi bi-search me-3 fs-5"></i> <span class="fw-medium">Lacak Paket</span>
            </a>
            <a href="<?= BASEURL ?>/pengiriman" class="nav-link rounded py-2 mb-2 d-flex align-items-center sidebar-link
            <?= $current_page == 'pengiriman' ? 'active-sidebar-link' : '' ?>">
                <i class="bi bi-box me-3 fs-5"></i> <span class="fw-medium">New Order</span>
            </a>
            <a href="<?= BASEURL ?>/laporan" class="nav-link rounded py-2 mb-2 d-flex align-items-center sidebar-link
            <?= $current_page == 'laporan' ? 'active-sidebar-link' : '' ?>">
                <i class="bi bi-bar-chart-line me-3 fs-5"></i> <span class="fw-medium">Reports</span>
            </a>
            <a href="<?= BASEURL ?>/kota" class="nav-link rounded py-2 mb-2 d-flex align-items-center sidebar-link
            <?= $current_page == 'kota' ? 'active-sidebar-link' : '' ?>">
                <i class="bi bi-geo-alt me-3 fs-5"></i> <span class="fw-medium">Kota</span>
            </a>
            <a href="<?= BASEURL ?>/tarif" class="nav-link rounded py-2 mb-2 d-flex align-items-center sidebar-link
            <?= $current_page == 'tarif' ? 'active-sidebar-link' : '' ?>">
                <i class="bi bi-currency-dollar me-3 fs-5"></i> <span class="fw-medium">Tarif</span>
            </a>
            <a href="<?= BASEURL ?>/layanan" class="nav-link rounded py-2 mb-2 d-flex align-items-center sidebar-link
            <?= $current_page == 'layanan' ? 'active-sidebar-link' : '' ?>">
                <i class="bi bi-tools me-3 fs-5"></i> <span class="fw-medium">Layanan</span>
            </a>
            <a href="<?= BASEURL ?>/notifikasi" class="nav-link rounded py-2 mb-2 d-flex align-items-center sidebar-link
            <?= $current_page == 'notifikasi' ? 'active-sidebar-link' : '' ?>">
                <i class="bi bi-bell me-3 fs-5"></i> <span class="fw-medium">Log Riwayat</span>
            </a>
        </nav>
    </aside>


    <main class="flex-1 overflow-y-auto py-1 lg:p-10 lg:ml-64">