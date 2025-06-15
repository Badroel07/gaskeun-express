<div class="container my-2">
    <h2 class="h4 fw-semibold text-dark mb-4">Daftar Layanan</h2>

    <!-- Tombol Tambah -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formModal" id="tombolTambahData">
        Tambah Data Layanan
    </button>

    <!-- Tabel Layanan -->
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-nowrap" id="layanan-table">
                    <thead class="table-light">
                        <tr>
                            <th>No.</th>
                            <th>Nama Layanan</th>
                            <th>Deskripsi</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data['layanan'])): ?>
                            <?php $i = 1; ?>
                            <?php foreach ($data['layanan'] as $layanan): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= htmlspecialchars($layanan['nama_layanan']) ?></td>
                                    <td><?= htmlspecialchars($layanan['deskripsi_layanan']) ?></td>
                                    <td class="text-end">
                                        <a href="<?= BASEURL; ?>/layanan/ubah/<?= $layanan['id_layanan'] ?>"
                                           class="btn btn-sm btn-warning tampilModalUbahLayanan me-2"
                                           data-bs-toggle="modal"
                                           data-bs-target="#formModal"
                                           data-id="<?= $layanan['id_layanan'] ?>">
                                           Ubah
                                        </a>
                                        <a href="<?= BASEURL; ?>/layanan/hapus/<?= $layanan['id_layanan'] ?>"
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Yakin ingin menghapus data ini?');">
                                           Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted">Tidak ada data layanan ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Form Tambah/Ubah -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= BASEURL; ?>/layanan/tambah" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Tambah Data Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_layanan" id="id_layanan">

                    <div class="mb-3">
                        <label for="nama_layanan" class="form-label">Nama Layanan</label>
                        <input type="text" class="form-control" name="nama_layanan" id="nama_layanan" placeholder="Contoh: Reguler" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi_layanan" class="form-label">Deskripsi Layanan</label>
                        <textarea class="form-control" name="deskripsi_layanan" id="deskripsi_layanan" rows="3" placeholder="Contoh: Pengiriman 2-3 hari kerja..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
