<div class="container">
    <h2 class="h4 fw-bold text-dark mb-4 border-bottom pb-2">Daftar Kota</h2>

    <button type="button" class="btn btn-primary-gradient rounded-pill px-4 py-2 mb-4 shadow-sm"
        data-bs-toggle="modal" data-bs-target="#formModal" id="tombolTambahData">
        <i class="bi bi-plus-circle-fill me-2"></i> Tambah Data Kota
    </button>

    <div class="card rounded-4 shadow-lg border-0">
        <div class="card-body p-4">
            <h5 class="card-title fw-bold text-dark mb-4 pb-3 border-bottom">
                <i class="bi bi-geo-alt-fill me-2 text-info"></i>Data Kota Tersedia
            </h5>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary-subtle border-bottom border-primary-subtle">
                        <tr>
                            <th scope="col" class="text-primary">No.</th>
                            <th scope="col" class="text-primary">Nama Kota</th>
                            <th scope="col" class="text-primary">Zona</th>
                            <th scope="col" class="text-primary text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="zona-table-body">
                        <?php if (isset($data['kota']) && count($data['kota']) > 0): ?>
                            <?php $i = 1; ?>
                            <?php foreach ($data['kota'] as $kota): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= htmlspecialchars($kota['nama_kota'] ?? '') ?></td>
                                    <td><span class="badge text-bg-secondary px-3 py-2 fw-normal"><?= htmlspecialchars($kota['zona_kota'] ?? '') ?></span></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-warning-gradient rounded-pill px-3 me-2 tampilModalUbahKota"
                                            data-bs-toggle="modal"
                                            data-bs-target="#formModal"
                                            data-id="<?= htmlspecialchars($kota['id_kota']) ?>">
                                            <i class="bi bi-pencil-square"></i> Ubah
                                        </button>
                                        <a href="<?= BASEURL; ?>/kota/hapus/<?= htmlspecialchars($kota['id_kota'] ?? '') ?>"
                                            class="btn btn-sm btn-danger-gradient rounded-pill px-3"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus kota ini? Tindakan ini tidak dapat dibatalkan.');">
                                            <i class="bi bi-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr id="no-zona-data-row">
                                <td colspan="4" class="text-center text-muted py-4">
                                    <i class="bi bi-geo-alt-fill me-2 fs-4"></i> Tidak ada data kota ditemukan.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg">
            <form action="<?= BASEURL; ?>/kota/tambah" method="post">
                <div class="modal-header bg-primary-subtle border-bottom-0 rounded-top-4">
                    <h5 class="modal-title fw-bold text-primary" id="formModalLabel">Tambah Data Kota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" name="id_kota" id="id_kota">
                    <div class="mb-3">
                        <label for="nama_kota" class="form-label text-muted fw-semibold">Nama Kota</label>
                        <input type="text" class="form-control form-control-lg rounded-pill shadow-sm" name="nama_kota" id="nama_kota" placeholder="Contoh: Bandung" required>
                    </div>
                    <div class="mb-3">
                        <label for="zona_kota" class="form-label text-muted fw-semibold">Zona Kota</label>
                        <input type="text" class="form-control form-control-lg rounded-pill shadow-sm" name="zona_kota" id="zona_kota" placeholder="Contoh: A, B, C" required>
                    </div>
                </div>
                <div class="modal-footer border-top-0 pt-0 justify-content-center">
                    <button type="submit" class="btn btn-primary-gradient w-75 rounded-pill py-2 shadow-sm">
                        <i class="bi bi-save-fill me-2"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* General Styling (consistent) */
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

    /* Card Styling (consistent) */
    .card.rounded-4 {
        border-radius: 1.5rem !important;
    }

    .shadow-lg {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }

    .card-title {
        font-size: 1.25rem;
    }

    /* Form Control Styling (consistent) */
    .form-control-lg,
    .form-select-lg {
        height: calc(3.5rem + 2px);
        padding: 0.75rem 1.5rem;
        font-size: 1.1rem;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
    }

    .rounded-pill {
        border-radius: 50rem !important;
    }

    /* Gradient Buttons (consistent) */
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

    .btn-warning-gradient {
        background: linear-gradient(45deg, #ffc107, #e0a800);
        color: #343a40; /* Darker text for better contrast */
        border: none;
        transition: all 0.3s ease;
    }
    .btn-warning-gradient:hover {
        background: linear-gradient(45deg, #e0a800, #c69500);
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(255, 193, 7, 0.3) !important;
    }

    .btn-danger-gradient {
        background: linear-gradient(45deg, #dc3545, #c82333);
        color: white;
        border: none;
        transition: all 0.3s ease;
    }
    .btn-danger-gradient:hover {
        background: linear-gradient(45deg, #c82333, #bd2130);
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(220, 53, 69, 0.3) !important;
    }

    /* Table Styling (consistent) */
    .table {
        border-collapse: separate;
        border-spacing: 0 0.5rem; /* Space between rows */
    }

    .table th,
    .table td {
        padding: 1rem 1rem;
        vertical-align: middle;
    }

    .table thead th {
        border-bottom: 2px solid var(--bs-primary-subtle);
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        background-color: var(--bs-table-striped-bg);
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f8f9fa;
    }

    .table-hover tbody tr:hover {
        background-color: #e9ecef;
        transform: translateY(-2px);
        box-shadow: 0 0.2rem 0.5rem rgba(0, 0, 0, 0.08);
        transition: all 0.2s ease;
    }

    /* Badge for Zona */
    .badge {
        padding: 0.5em 0.8em;
        font-size: 0.75em;
        font-weight: 600;
        border-radius: 0.35rem;
        text-transform: uppercase; /* Make zone appear in uppercase */
    }

    /* No Data Row */
    .table tbody tr td[colspan="4"] {
        padding: 3rem 1rem;
        font-size: 1.1rem;
    }

    /* Modal Styling */
    .modal-content {
        border-radius: 1.5rem !important;
    }

    .modal-header {
        padding: 1.5rem 2rem;
    }
    .modal-header .btn-close {
        font-size: 1.25rem;
    }
    .modal-body {
        padding: 2rem;
    }
    .modal-footer {
        padding: 1.5rem 2rem;
        justify-content: center;
        border-top: none; /* Remove default border */
    }

</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Tombol Tambah
        const tombolTambah = document.getElementById('tombolTambahData');
        if (tombolTambah) {
            tombolTambah.addEventListener('click', function () {
                const form = document.querySelector('#formModal form');
                form.reset();
                document.getElementById('formModalLabel').textContent = 'Tambah Data Kota';
                form.action = '<?= BASEURL; ?>/kota/tambah';

                // Kosongkan input hidden
                document.getElementById('id_kota').value = '';

                // Clear validation states if any
                Array.from(form.elements).forEach(element => {
                    element.classList.remove('is-invalid', 'is-valid');
                });
            });
        }

        // Tombol Ubah
        const tombolUbah = document.querySelectorAll('.tampilModalUbahKota');
        tombolUbah.forEach(function (btn) {
            btn.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const form = document.querySelector('#formModal form');
                form.action = '<?= BASEURL; ?>/kota/ubah';
                document.getElementById('formModalLabel').textContent = 'Ubah Data Kota';

                // Clear validation states if any
                Array.from(form.elements).forEach(element => {
                    element.classList.remove('is-invalid', 'is-valid');
                });

                // Ambil data kota via fetch
                fetch('<?= BASEURL; ?>/kota/getUbah', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'id=' + encodeURIComponent(id)
                })
                .then(response => {
                    if (!response.ok) {
                        if (response.status === 404) {
                            throw new Error('Data kota tidak ditemukan.');
                        }
                        throw new Error('Gagal mengambil data. Status: ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data) {
                        document.getElementById('id_kota').value = data.id_kota;
                        document.getElementById('nama_kota').value = data.nama_kota;
                        document.getElementById('zona_kota').value = data.zona_kota;
                    } else {
                        alert('Data kota tidak valid.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Gagal mengambil data kota: ' + error.message + '. Silakan coba lagi.');
                });
            });
        });
    });
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">