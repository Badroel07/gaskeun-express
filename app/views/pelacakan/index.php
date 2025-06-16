<div class="container">
    <h2 class="h4 fw-bold text-dark mb-4 border-bottom pb-2">Pelacakan Status Pengiriman</h2>

    <form action="<?= BASEURL; ?>/pelacakan/cari" method="POST" class="bg-white p-4 rounded-4 shadow-sm mb-5 border border-light">
        <div class="row g-3 align-items-end">
            <div class="col-12 col-md">
                <label for="tracking-id" class="form-label text-muted fw-semibold mb-2">Nomor Resi / ID Paket</label>
                <div class="input-group input-group-lg">
                    <span class="input-group-text bg-light border-end-0 text-muted rounded-start-pill"><i class="bi bi-box-seam"></i></span>
                    <input type="text" name="tracking_id" id="tracking-id" class="form-control border-start-0 rounded-end-pill ps-2" placeholder="Masukkan ID Paket Anda di sini..." required>
                </div>
            </div>
            <div class="col-12 col-md-auto">
                <button type="submit" class="btn btn-primary-gradient w-100 rounded-pill py-2 px-4 shadow-sm">
                    <i class="bi bi-search me-2"></i> Lacak Paket
                </button>
            </div>
        </div>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
        <?php if (isset($data['pelacakan']) && count($data['pelacakan']) > 0) : ?>
            <div class="card rounded-4 shadow-lg border-0 mb-4">
                <div class="card-body p-4">
                    <h5 class="card-title fw-bold text-dark mb-4 pb-2 border-bottom">Hasil Pelacakan ID Paket: <span class="text-primary"><?= htmlspecialchars($id_paket ?? '') ?></span></h5>

                    <div class="row g-3 tracking-details mb-4">
                        <?php $item = $data['pelacakan'][0]; // Assuming $data['pelacakan'] has one main item for general details ?>
                        <div class="col-md-6 col-lg-4">
                            <p class="mb-0 text-muted small">ID Paket</p>
                            <p class="mb-0 fw-semibold text-dark"><?= htmlspecialchars($item['id_paket']) ?></p>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <p class="mb-0 text-muted small">Kurir Pengirim</p>
                            <p class="mb-0 fw-semibold text-dark"><?= htmlspecialchars($item['nama_kurir'] ?? '-') ?></p>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <p class="mb-0 text-muted small">Nama Pengirim</p>
                            <p class="mb-0 fw-semibold text-dark"><?= htmlspecialchars($item['nama_pengirim'] ?? '-') ?></p>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <p class="mb-0 text-muted small">Nama Penerima</p>
                            <p class="mb-0 fw-semibold text-dark"><?= htmlspecialchars($item['nama_penerima'] ?? '-') ?></p>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <p class="mb-0 text-muted small">Asal - Tujuan</p>
                            <p class="mb-0 fw-semibold text-dark"><?= htmlspecialchars($item['kota_asal'] ?? '-') ?> <i class="bi bi-arrow-right mx-1"></i> <?= htmlspecialchars($item['kota_tujuan'] ?? '-') ?></p>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <p class="mb-0 text-muted small">Berat</p>
                            <p class="mb-0 fw-semibold text-dark"><?= htmlspecialchars($item['berat_paket'] ?? '-') ?> kg</p>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <p class="mb-0 text-muted small">Layanan</p>
                            <p class="mb-0 fw-semibold text-dark"><?= htmlspecialchars($item['layanan'] ?? '-') ?></p>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <p class="mb-0 text-muted small">Ongkir</p>
                            <p class="mb-0 fw-semibold text-dark">Rp <?= number_format($item['ongkos_kirim'] ?? 0, 0, ',', '.') ?></p>
                        </div>
                        <div class="col-12">
                            <p class="mb-0 text-muted small">Keterangan Tambahan</p>
                            <p class="mb-0 fw-semibold text-dark"><?= htmlspecialchars($item['keterangan'] ?? '-') ?></p>
                        </div>
                    </div>

                    <h6 class="fw-bold text-dark mb-3 mt-4">Riwayat Status Paket</h6>
                    <div class="timeline">
                        <?php foreach ($data['pelacakan'] as $index => $history_item) : ?>
                            <?php
                            $status_icon = '';
                            $status_text_color = '';
                            switch ($history_item['status_saat_ini']) {
                                case 'Pickup':
                                    $status_icon = 'bi bi-box-arrow-in-right';
                                    $status_text_color = 'text-primary';
                                    break;
                                case 'Dalam Pengantaran':
                                    $status_icon = 'bi bi-truck';
                                    $status_text_color = 'text-info';
                                    break;
                                case 'Transit':
                                    $status_icon = 'bi bi-geo-alt';
                                    $status_text_color = 'text-warning';
                                    break;
                                case 'Terkirim':
                                    $status_icon = 'bi bi-check-circle-fill';
                                    $status_text_color = 'text-success';
                                    break;
                                default:
                                    $status_icon = 'bi bi-info-circle';
                                    $status_text_color = 'text-secondary';
                            }
                            ?>
                            <div class="timeline-item <?= $index === 0 ? 'active' : '' ?>">
                                <div class="timeline-icon <?= $status_text_color ?>">
                                    <i class="<?= $status_icon ?>"></i>
                                </div>
                                <div class="timeline-content card bg-light border-0 shadow-sm rounded-3 p-3">
                                    <p class="fw-bold mb-1 <?= $status_text_color ?>"><?= htmlspecialchars($history_item['status_saat_ini']) ?></p>
                                    <p class="mb-1 text-dark small"><?= htmlspecialchars($history_item['keterangan']) ?></p>
                                    <p class="mb-0 text-muted smaller fst-italic"><?= htmlspecialchars($history_item['tanggal_update']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <form action="<?= BASEURL ?>/pelacakan/updateStatus" method="POST" class="mt-5 pt-3 border-top">
                        <input type="hidden" name="id_paket" value="<?= htmlspecialchars($item['id_paket']) ?>">
                        <div class="row g-3 align-items-end">
                            <div class="col-12 col-md-6">
                                <label for="update-status-select" class="form-label text-muted fw-semibold">Perbarui Status Paket</label>
                                <select name="status_saat_ini" id="update-status-select" class="form-select form-select-lg rounded-pill shadow-sm">
                                    <option value="Pickup" <?= ($item['status_saat_ini'] == 'Pickup') ? 'selected' : '' ?>>Pickup</option>
                                    <option value="Dalam Pengantaran" <?= ($item['status_saat_ini'] == 'Dalam Pengantaran') ? 'selected' : '' ?>>Dalam Pengantaran</option>
                                    <option value="Transit" <?= ($item['status_saat_ini'] == 'Transit') ? 'selected' : '' ?>>Transit</option>
                                    <option value="Terkirim" <?= ($item['status_saat_ini'] == 'Terkirim') ? 'selected' : '' ?>>Terkirim</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-auto">
                                <button type="submit" class="btn btn-success-gradient w-100 rounded-pill py-2 px-4 shadow-sm">
                                    <i class="bi bi-arrow-clockwise me-2"></i> Update Status
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        <?php elseif (isset($data['pelacakan'])) : ?>
            <div class="alert alert-warning text-center py-4 rounded-4 shadow-sm animate__animated animate__fadeIn" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                Data tidak ditemukan untuk ID Paket **<?= htmlspecialchars($id_paket ?? '') ?>**. Mohon periksa kembali nomor resi Anda.
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>

<style>
    /* General Styling */
    .container {
        padding-top: 2rem;
        padding-bottom: 2rem;
    }

    .fw-bold {
        font-weight: 700 !important;
    }

    .fw-semibold {
        font-weight: 600 !important;
    }

    .smaller {
        font-size: 0.8em;
    }

    .fst-italic {
        font-style: italic;
    }

    /* Form Styling */
    .form-control:focus,
    .form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
    }

    .input-group-text {
        border-right: none;
        background-color: var(--bs-light);
    }

    .rounded-start-pill {
        border-top-left-radius: 1.5rem !important;
        border-bottom-left-radius: 1.5rem !important;
    }

    .rounded-end-pill {
        border-top-right-radius: 1.5rem !important;
        border-bottom-right-radius: 1.5rem !important;
    }

    /* Gradient Buttons */
    .btn-primary-gradient {
        background: linear-gradient(45deg, #007bff, #0056b3);
        color: white;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-primary-gradient:hover {
        background: linear-gradient(45deg, #0056b3, #004085);
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(0, 123, 255, 0.3) !important;
    }

    .btn-success-gradient {
        background: linear-gradient(45deg, #28a745, #1e7e34);
        color: white;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-success-gradient:hover {
        background: linear-gradient(45deg, #1e7e34, #155d28);
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(40, 167, 69, 0.3) !important;
    }

    /* Card Styling */
    .card.rounded-4 {
        border-radius: 1.5rem !important;
    }

    .shadow-lg {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }

    /* Tracking Details Grid */
    .tracking-details p {
        margin-bottom: 0.2rem; /* Reduce space between label and value */
    }

    .tracking-details .text-muted.small {
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Timeline Styling */
    .timeline {
        position: relative;
        padding: 1rem 0;
        margin-left: 2rem; /* Space for the line and icons */
    }

    .timeline::before {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        width: 3px;
        background-color: #dee2e6; /* Light gray line */
        border-radius: 3px;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 2rem;
        padding-left: 2rem; /* Space for content after icon */
    }

    .timeline-item:last-child {
        margin-bottom: 0;
    }

    .timeline-icon {
        position: absolute;
        left: -1rem; /* Adjust to align with the line */
        top: 0;
        background-color: #fff;
        border: 3px solid #dee2e6;
        border-radius: 50%;
        width: 2.5rem;
        height: 2.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        color: #6c757d;
        transition: all 0.3s ease;
        z-index: 1; /* Ensure icon is above the line */
    }

    .timeline-item.active .timeline-icon {
        border-color: #007bff; /* Primary color border for active */
        color: #007bff;
        box-shadow: 0 0 0 5px rgba(0, 123, 255, 0.2); /* Glow effect */
    }

    .timeline-content {
        padding: 1rem;
        background-color: #f8f9fa; /* Light background for content */
        border-left: 4px solid #007bff; /* Primary border for active */
        transition: all 0.3s ease;
    }

    .timeline-item.active .timeline-content {
        border-left-color: #007bff; /* Highlight active content */
        box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
    }

    /* Alert Styling for No Data */
    .alert.alert-warning {
        background-color: #fff3cd;
        border-color: #ffeeba;
        color: #856404;
    }

    .animate__animated {
        animation-duration: 0.5s;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">