<div class="container my-2">
    <h2 class="h4 fw-semibold text-dark mb-4">Riwayat & Laporan Pengiriman</h2>

    <!-- Filter Form -->
    <div class="bg-light p-4 rounded border mb-4">
        <form method="GET" action="<?= BASEURL; ?>/laporan" class="row g-3">
            <div class="col-md-4">
                <label for="kota_tujuan" class="form-label">Kota Tujuan</label>
                <select name="kota_tujuan" id="kota_tujuan" class="form-select">
                    <option value="">Semua Kota</option>
                    <?php foreach ($data['kota'] as $kota): ?>
                        <option value="<?= $kota['nama_kota'] ?>" <?= ($data['selected_kota'] == $kota['nama_kota']) ? 'selected' : '' ?>>
                            <?= $kota['nama_kota'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="">Semua Status</option>
                    <option value="Transit" <?= ($data['selected_status'] == 'Transit') ? 'selected' : '' ?>>Transit</option>
                    <option value="Terkirim" <?= ($data['selected_status'] == 'Terkirim') ? 'selected' : '' ?>>Terkirim</option>
                    <option value="Dalam Pengiriman" <?= ($data['selected_status'] == 'Dalam Pengiriman') ? 'selected' : '' ?>>Dalam Pengiriman</option>
                    <option value="Pickup" <?= ($data['selected_status'] == 'Pickup') ? 'selected' : '' ?>>Pickup</option>
                </select>
            </div>
            <div class="col-md-4 align-self-end">
                <button type="submit" class="btn btn-primary w-100">Filter Laporan</button>
            </div>
        </form>
    </div>

    <!-- Tabel Laporan -->
    <div class="bg-white p-4 rounded border shadow-sm">
        <h5 class="fw-bold text-dark mb-3">Daftar Pengiriman</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-nowrap">
                <thead class="table-light">
                    <tr>
                        <th>ID Paket</th>
                        <th>Pengirim</th>
                        <th>Penerima</th>
                        <th>Asal - Tujuan</th>
                        <th>Berat (Kg)</th>
                        <th>Biaya</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($data['laporan']) > 0): ?>
                        <?php foreach ($data['laporan'] as $lap): ?>
                            <tr data-city="<?= $lap['kota_tujuan'] ?>" data-status="<?= $lap['status'] ?>">
                                <td><?= $lap['id_paket'] ?></td>
                                <td><?= $lap['pengirim'] ?></td>
                                <td><?= $lap['penerima'] ?></td>
                                <td><?= $lap['kota_asal'] ?> → <?= $lap['kota_tujuan'] ?></td>
                                <td><?= $lap['berat_paket'] ?></td>
                                <td>Rp <?= number_format($lap['ongkos_kirim'], 0, ',', '.') ?></td>
                                <td><?= $lap['status'] ?></td>
                                <td><?= $lap['tanggal'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center text-muted">Tidak ada data ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
