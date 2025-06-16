<div class="container my-2">
    <h2 class="h4 fw-semibold text-dark mb-4">Daftar Kota</h2>

    <!-- Tombol Tambah -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formModal" id="tombolTambahData">
        Tambah Data Kota
    </button>

    <!-- Tabel Kota -->
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-nowrap" id="zona-table">
                    <thead class="table-light">
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Zona</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="zona-table-body">
                        <?php if (isset($data['kota']) && count($data['kota']) > 0): ?>
                            <?php $i = 1; ?>
                            <?php foreach ($data['kota'] as $kota): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= htmlspecialchars($kota['nama_kota'] ?? '') ?></td>
                                    <td><?= htmlspecialchars($kota['zona_kota'] ?? '') ?></td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-warning tampilModalUbahKota me-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#formModal"
                                            data-id="<?= htmlspecialchars($kota['id_kota']) ?>">
                                            Ubah
                                        </a>
                                        <a href="<?= BASEURL; ?>/kota/hapus/<?= htmlspecialchars($kota['id_kota'] ?? '') ?>"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus data ini?');">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr id="no-zona-data-row">
                                <td colspan="4" class="text-center text-muted">Tidak ada data kota ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Form -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= BASEURL; ?>/kota/tambah" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Tambah Data Kota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_kota" id="id_kota">
                    <div class="mb-3">
                        <label for="nama_kota" class="form-label">Nama Kota</label>
                        <input type="text" class="form-control" name="nama_kota" id="nama_kota" placeholder="Masukkan nama kota" required>
                    </div>
                    <div class="mb-3">
                        <label for="zona_kota" class="form-label">Zona Kota</label>
                        <input type="text" class="form-control" name="zona_kota" id="zona_kota" placeholder="Masukkan zona kota" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

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

                // Ambil data kota via fetch
                fetch('<?= BASEURL; ?>/kota/getUbah', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'id=' + encodeURIComponent(id)
                })
                .then(response => {
                    if (!response.ok) throw new Error('Gagal mengambil data');
                    return response.json();
                })
                .then(data => {
                    document.getElementById('id_kota').value = data.id_kota;
                    document.getElementById('nama_kota').value = data.nama_kota;
                    document.getElementById('zona_kota').value = data.zona_kota;
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Gagal mengambil data kota. Silakan coba lagi.');
                });
            });
        });
    });
</script>
