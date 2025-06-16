<div class="container">
    <h2 class="h4 fw-bold text-dark mb-4 border-bottom pb-2">Daftar Tarif Pengiriman</h2>

    <button type="button" class="btn btn-primary-gradient rounded-pill px-4 py-2 mb-4 shadow-sm"
        data-bs-toggle="modal" data-bs-target="#formModal" id="tombolTambahData">
        <i class="bi bi-plus-circle-fill me-2"></i> Tambah Tarif Baru
    </button>

    <div class="card rounded-4 shadow-lg border-0">
        <div class="card-body p-4">
            <h5 class="card-title fw-bold text-dark mb-4 pb-3 border-bottom">
                <i class="bi bi-currency-dollar me-2 text-info"></i>Data Tarif Tersedia
            </h5>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary-subtle border-bottom border-primary-subtle">
                        <tr>
                            <th scope="col" class="text-primary">No.</th>
                            <th scope="col" class="text-primary">Kota Asal</th>
                            <th scope="col" class="text-primary">Kota Tujuan</th>
                            <th scope="col" class="text-primary">Layanan</th>
                            <th scope="col" class="text-primary text-end">Tarif per Kg</th>
                            <th scope="col" class="text-primary text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($data['tarif']) && count($data['tarif']) > 0): ?>
                            <?php $i = 1; ?>
                            <?php foreach ($data['tarif'] as $tarif): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= htmlspecialchars($tarif['nama_kota_asal'] ?? '') ?></td>
                                    <td><?= htmlspecialchars($tarif['nama_kota_tujuan'] ?? '') ?></td>
                                    <td><span class="badge text-bg-primary px-3 py-2 fw-normal"><?= htmlspecialchars($tarif['nama_layanan'] ?? '') ?></span></td>
                                    <td class="text-end fw-semibold">Rp <?= number_format($tarif['tarif_per_kg'], 0, ',', '.') ?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-warning-gradient rounded-pill px-3 me-2 tampilModalUbahTarif"
                                            data-bs-toggle="modal"
                                            data-bs-target="#formModal"
                                            data-id="<?= htmlspecialchars($tarif['id_tarif']) ?>">
                                            <i class="bi bi-pencil-square"></i> Ubah
                                        </button>
                                        <a href="<?= BASEURL; ?>/tarif/hapus/<?= htmlspecialchars($tarif['id_tarif']) ?>"
                                            class="btn btn-sm btn-danger-gradient rounded-pill px-3"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data tarif ini? Tindakan ini tidak dapat dibatalkan.');">
                                            <i class="bi bi-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <i class="bi bi-currency-dollar me-2 fs-4"></i> Tidak ada data tarif ditemukan.
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
            <form action="<?= BASEURL; ?>/tarif/tambah" method="post" id="formTarif">
                <div class="modal-header bg-primary-subtle border-bottom-0 rounded-top-4">
                    <h5 class="modal-title fw-bold text-primary" id="formModalLabel">Tambah Data Tarif</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" name="id_tarif" id="id_tarif">

                    <div class="mb-3">
                        <label for="id_kota_asal" class="form-label text-muted fw-semibold">Kota Asal</label>
                        <select name="id_kota_asal" id="id_kota_asal" class="form-select form-select-lg rounded-pill shadow-sm" required>
                            <option value="" disabled selected>Pilih Kota Asal</option>
                            <?php foreach ($data['kota'] as $kota): ?>
                                <option value="<?= htmlspecialchars($kota['id_kota']) ?>"><?= htmlspecialchars($kota['nama_kota']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_kota_tujuan" class="form-label text-muted fw-semibold">Kota Tujuan</label>
                        <select name="id_kota_tujuan" id="id_kota_tujuan" class="form-select form-select-lg rounded-pill shadow-sm" required>
                            <option value="" disabled selected>Pilih Kota Tujuan</option>
                            <?php foreach ($data['kota'] as $kota): ?>
                                <option value="<?= htmlspecialchars($kota['id_kota']) ?>"><?= htmlspecialchars($kota['nama_kota']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_layanan" class="form-label text-muted fw-semibold">Jenis Layanan</label>
                        <select name="id_layanan" id="id_layanan" class="form-select form-select-lg rounded-pill shadow-sm" required>
                            <option value="" disabled selected>Pilih Layanan</option>
                            <?php foreach ($data['layanan'] as $layanan): ?>
                                <option value="<?= htmlspecialchars($layanan['id_layanan']) ?>"><?= htmlspecialchars($layanan['nama_layanan']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tarif_per_kg" class="form-label text-muted fw-semibold">Tarif per Kg (Rp)</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-light border-end-0 rounded-start-pill text-muted">Rp</span>
                            <input type="number" step="0.01" class="form-control border-start-0 rounded-end-pill shadow-sm" name="tarif_per_kg" id="tarif_per_kg" placeholder="Contoh: 15000.00" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0 pt-0 justify-content-center">
                    <button type="submit" class="btn btn-primary-gradient w-75 rounded-pill py-2 shadow-sm">
                        <i class="bi bi-save-fill me-2"></i> Simpan Data Tarif
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

    /* Input Group Addons */
    .input-group-text {
        background-color: var(--bs-light);
        color: var(--bs-muted);
        border: 1px solid var(--bs-border-color);
        padding: 0.75rem 1rem;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
    }

    .rounded-start-pill {
        border-top-left-radius: 50rem !important;
        border-bottom-left-radius: 50rem !important;
    }

    .rounded-end-pill {
        border-top-right-radius: 50rem !important;
        border-bottom-right-radius: 50rem !important;
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

    /* Badge for Layanan */
    .badge {
        padding: 0.5em 0.8em;
        font-size: 0.75em;
        font-weight: 600;
        border-radius: 0.35rem;
        text-transform: capitalize;
    }

    /* No Data Row */
    .table tbody tr td[colspan="6"] {
        padding: 3rem 1rem;
        font-size: 1.1rem;
    }

    /* Modal Styling (consistent) */
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
        border-top: none;
    }

</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle "Tambah Data Tarif" button click
        const tombolTambah = document.getElementById('tombolTambahData');
        if (tombolTambah) {
            tombolTambah.addEventListener('click', function() {
                // Reset form and set for adding new data
                const form = document.getElementById('formTarif');
                form.reset(); // Resets form fields
                document.getElementById('formModalLabel').textContent = 'Tambah Data Tarif';
                form.action = '<?= BASEURL; ?>/tarif/tambah';
                
                // Clear hidden ID field
                document.getElementById('id_tarif').value = '';
                
                // Reset all select elements to their initial "Pilih..." state
                document.getElementById('id_kota_asal').value = '';
                document.getElementById('id_kota_tujuan').value = '';
                document.getElementById('id_layanan').value = '';
                document.getElementById('tarif_per_kg').value = '';

                // Clear any validation states
                Array.from(form.elements).forEach(element => {
                    element.classList.remove('is-invalid', 'is-valid');
                });
            });
        }
        
        // Handle "Ubah" buttons
        const tombolUbah = document.querySelectorAll('.tampilModalUbahTarif');
        tombolUbah.forEach(function(btn) {
            btn.addEventListener('click', function() {
                // Set form for editing
                const form = document.getElementById('formTarif');
                document.getElementById('formModalLabel').textContent = 'Ubah Data Tarif';
                form.action = '<?= BASEURL; ?>/tarif/ubah';
                
                // Get tarif ID from data attribute
                const id = this.getAttribute('data-id');

                // Clear any validation states
                Array.from(form.elements).forEach(element => {
                    element.classList.remove('is-invalid', 'is-valid');
                });
                
                // Fetch tarif data via AJAX
                fetch('<?= BASEURL; ?>/tarif/getUbah', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'id=' + encodeURIComponent(id)
                })
                .then(response => {
                    if (!response.ok) {
                        if (response.status === 404) {
                            throw new Error('Data tarif tidak ditemukan.');
                        }
                        throw new Error('Gagal mengambil data. Status: ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    // Populate form with fetched data
                    if (data) {
                        document.getElementById('id_tarif').value = data.id_tarif;
                        document.getElementById('id_kota_asal').value = data.id_kota_asal;
                        document.getElementById('id_kota_tujuan').value = data.id_kota_tujuan;
                        document.getElementById('id_layanan').value = data.id_layanan;
                        document.getElementById('tarif_per_kg').value = parseFloat(data.tarif_per_kg); // Ensure number type
                    } else {
                        alert('Data tarif tidak valid atau kosong.');
                    }
                })
                .catch(error => {
                    console.error('Error fetching tarif data:', error);
                    alert('Gagal mengambil data tarif: ' + error.message + '. Silakan coba lagi.');
                });
            });
        });
    });
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">