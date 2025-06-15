<div class="container my-2">
    <h2 class="h4 fw-semibold text-dark mb-4">Daftar Tarif</h2>

    <!-- Tombol Tambah -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formModal" id="tombolTambahData">
        Tambah Data Tarif
    </button>

    <!-- Tabel Tarif -->
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-nowrap" id="zona-table">
                    <thead class="table-light">
                        <tr>
                            <th>No.</th>
                            <th>Kota Asal</th>
                            <th>Kota Tujuan</th>
                            <th>Layanan</th>
                            <th>Tarif per Kg</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="zona-table-body">
                        <?php if (isset($data['tarif']) && count($data['tarif']) > 0): ?>
                            <?php $i = 1; ?>
                            <?php foreach ($data['tarif'] as $tarif): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= htmlspecialchars($tarif['nama_kota_asal'] ?? '') ?></td>
                                    <td><?= htmlspecialchars($tarif['nama_kota_tujuan'] ?? '') ?></td>
                                    <td><?= htmlspecialchars($tarif['nama_layanan'] ?? '') ?></td>
                                    <td><?= htmlspecialchars(number_format($tarif['tarif_per_kg'], 2)) ?></td>
                                    <td class="text-end">
                                        <a href="<?= BASEURL; ?>/tarif/ubah/<?= htmlspecialchars($tarif['id_tarif']) ?>"
                                           class="btn btn-sm btn-warning tampilModalUbahTarif me-2"
                                           data-bs-toggle="modal"
                                           data-bs-target="#formModal"
                                           data-id="<?= htmlspecialchars($tarif['id_tarif']) ?>">
                                           Ubah
                                        </a>
                                        <a href="<?= BASEURL; ?>/tarif/hapus/<?= htmlspecialchars($tarif['id_tarif']) ?>"
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Yakin ingin menghapus data ini?');">
                                           Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted">Tidak ada data tarif ditemukan.</td>
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
            <form action="<?= BASEURL; ?>/tarif/tambah" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Tambah Data Tarif</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_tarif" id="id_tarif">

                    <div class="mb-3">
                        <label for="id_kota_asal" class="form-label">Kota Asal</label>
                        <select name="id_kota_asal" id="id_kota_asal" class="form-select" required>
                            <option value="">Pilih Kota Asal</option>
                            <?php foreach ($data['kota'] as $kota): ?>
                                <option value="<?= $kota['id_kota'] ?>"><?= $kota['nama_kota'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_kota_tujuan" class="form-label">Kota Tujuan</label>
                        <select name="id_kota_tujuan" id="id_kota_tujuan" class="form-select" required>
                            <option value="">Pilih Kota Tujuan</option>
                            <?php foreach ($data['kota'] as $kota): ?>
                                <option value="<?= $kota['id_kota'] ?>"><?= $kota['nama_kota'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_layanan" class="form-label">Layanan</label>
                        <select name="id_layanan" id="id_layanan" class="form-select" required>
                            <option value="">Pilih Layanan</option>
                            <?php foreach ($data['layanan'] as $layanan): ?>
                                <option value="<?= $layanan['id_layanan'] ?>"><?= $layanan['nama_layanan'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tarif_per_kg" class="form-label">Tarif per Kg</label>
                        <input type="number" step="0.01" class="form-control" name="tarif_per_kg" id="tarif_per_kg" placeholder="Masukkan tarif per Kg" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
