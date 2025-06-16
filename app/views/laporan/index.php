<div class="container">
    <h2 class="h4 fw-bold text-dark mb-4 border-bottom pb-2">Riwayat & Laporan Pengiriman</h2>

    <div class="card rounded-4 shadow-lg border-0 mb-5">
        <div class="card-body p-4">
            <h5 class="card-title fw-bold text-dark mb-4 pb-3 border-bottom">
                <i class="bi bi-funnel-fill me-2 text-primary"></i>Filter Laporan
            </h5>
            <form method="GET" action="<?= BASEURL; ?>/laporan" class="row g-4 align-items-end">
                <div class="col-md-4">
                    <label for="kota_tujuan" class="form-label text-muted fw-semibold">Kota Tujuan</label>
                    <select name="kota_tujuan" id="kota_tujuan" class="form-select form-select-lg rounded-pill shadow-sm">
                        <option value="">Semua Kota</option>
                        <?php foreach ($data['kota'] as $kota): ?>
                            <option value="<?= htmlspecialchars($kota['nama_kota']) ?>" <?= ($data['selected_kota'] == $kota['nama_kota']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($kota['nama_kota']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="status" class="form-label text-muted fw-semibold">Status Pengiriman</label>
                    <select name="status" id="status" class="form-select form-select-lg rounded-pill shadow-sm">
                        <option value="">Semua Status</option>
                        <option value="Pickup" <?= ($data['selected_status'] == 'Pickup') ? 'selected' : '' ?>>Pickup</option>
                        <option value="Dalam Pengantaran" <?= ($data['selected_status'] == 'Dalam Pengantaran') ? 'selected' : '' ?>>Dalam Pengantaran</option>
                        <option value="Transit" <?= ($data['selected_status'] == 'Transit') ? 'selected' : '' ?>>Transit</option>
                        <option value="Terkirim" <?= ($data['selected_status'] == 'Terkirim') ? 'selected' : '' ?>>Terkirim</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary-gradient w-100 rounded-pill py-2 px-4 shadow-sm">
                        <i class="bi bi-filter-right me-2"></i> Terapkan Filter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card rounded-4 shadow-lg border-0">
        <div class="card-body p-4">
            <h5 class="card-title fw-bold text-dark mb-4 pb-3 border-bottom">
                <i class="bi bi-journal-text me-2 text-info"></i>Daftar Pengiriman
            </h5>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary-subtle border-bottom border-primary-subtle">
                        <tr>
                            <th scope="col" class="text-primary">ID Paket</th>
                            <th scope="col" class="text-primary">Pengirim</th>
                            <th scope="col" class="text-primary">Penerima</th>
                            <th scope="col" class="text-primary">Asal - Tujuan</th>
                            <th scope="col" class="text-primary text-end">Berat (Kg)</th>
                            <th scope="col" class="text-primary text-end">Biaya</th>
                            <th scope="col" class="text-primary">Status</th>
                            <th scope="col" class="text-primary">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($data['laporan']) > 0): ?>
                            <?php foreach ($data['laporan'] as $lap): ?>
                                <tr data-city="<?= htmlspecialchars($lap['kota_tujuan']) ?>" data-status="<?= htmlspecialchars($lap['status']) ?>">
                                    <td><strong><?= htmlspecialchars($lap['id_paket']) ?></strong></td>
                                    <td><?= htmlspecialchars($lap['pengirim']) ?></td>
                                    <td><?= htmlspecialchars($lap['penerima']) ?></td>
                                    <td><?= htmlspecialchars($lap['kota_asal']) ?> <i class="bi bi-arrow-right mx-1 text-muted small"></i> <?= htmlspecialchars($lap['kota_tujuan']) ?></td>
                                    <td class="text-end"><?= htmlspecialchars($lap['berat_paket']) ?></td>
                                    <td class="text-end">Rp <?= number_format($lap['ongkos_kirim'], 0, ',', '.') ?></td>
                                    <td>
                                        <?php
                                            $status_badge_class = '';
                                            switch ($lap['status']) {
                                                case 'Terkirim':
                                                    $status_badge_class = 'badge text-bg-success';
                                                    break;
                                                case 'Transit':
                                                    $status_badge_class = 'badge text-bg-warning';
                                                    break;
                                                case 'Dalam Pengantaran':
                                                    $status_badge_class = 'badge text-bg-info';
                                                    break;
                                                case 'Pickup':
                                                    $status_badge_class = 'badge text-bg-primary';
                                                    break;
                                                default:
                                                    $status_badge_class = 'badge text-bg-secondary';
                                                    break;
                                            }
                                        ?>
                                        <span class="<?= $status_badge_class ?>"><?= htmlspecialchars($lap['status']) ?></span>
                                    </td>
                                    <td><?= htmlspecialchars($lap['tanggal']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    <i class="bi bi-box-fill me-2 fs-4"></i> Tidak ada data pengiriman yang ditemukan sesuai filter.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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

    /* Card Styling (consistent with previous elements) */
    .card.rounded-4 {
        border-radius: 1.5rem !important;
    }

    .shadow-lg {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }

    .card-title {
        font-size: 1.25rem;
    }

    /* Form Control Styling (consistent with previous elements) */
    .form-select-lg {
        height: calc(3.5rem + 2px); /* Larger select fields */
        padding: 0.75rem 1.5rem;
        font-size: 1.1rem;
    }

    .form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
    }

    .rounded-pill {
        border-radius: 50rem !important;
    }

    /* Gradient Buttons (consistent with previous elements) */
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

    /* Table Styling */
    .table {
        border-collapse: separate; /* Required for rounded borders on cells if you want them */
        border-spacing: 0 0.5rem; /* Space between rows (optional, can remove) */
    }

    .table th,
    .table td {
        padding: 1rem 1rem; /* More padding for cells */
        vertical-align: middle;
    }

    .table thead th {
        border-bottom: 2px solid var(--bs-primary-subtle); /* Stronger bottom border for header */
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        background-color: var(--bs-table-striped-bg); /* Use Bootstrap var for consistent striped row color */
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f8f9fa; /* Lighter background for odd rows */
    }

    .table-hover tbody tr:hover {
        background-color: #e9ecef; /* Subtle hover effect */
        transform: translateY(-2px); /* Lift effect on hover */
        box-shadow: 0 0.2rem 0.5rem rgba(0, 0, 0, 0.08); /* Subtle shadow on hover */
        transition: all 0.2s ease;
    }

    /* Status Badges */
    .badge {
        padding: 0.5em 0.8em;
        font-size: 0.75em;
        font-weight: 600;
        border-radius: 0.35rem; /* Slightly rounded */
        text-transform: capitalize;
    }

    /* No Data Row */
    .table tbody tr td[colspan="8"] {
        padding: 3rem 1rem;
        font-size: 1.1rem;
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">