<div class="container my-2">
    <h2 class="h4 fw-semibold text-dark mb-4">Pelacakan Status Pengiriman</h2>

    <form action="<?= BASEURL; ?>/pelacakan/cari" method="POST" class="bg-light p-4 rounded border mb-4">
        <div class="row g-3 align-items-end">
            <div class="col-sm">
                <label for="tracking-id" class="form-label">Nomor Resi / ID Paket</label>
                <input type="text" name="tracking_id" id="tracking-id" class="form-control" placeholder="Masukkan ID Paket" required>
            </div>
            <div class="col-sm-auto">
                <button type="submit" class="btn btn-primary w-100">Lacak</button>
            </div>
        </div>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <?php if (isset($data['pelacakan']) && count($data['pelacakan']) > 0): ?>
            <div class="bg-white p-4 rounded border shadow-sm">
                <h5 class="fw-bold text-dark mb-3">Hasil Pelacakan ID Paket: <?= $id_paket ?? '' ?></h5>
                <?php foreach ($data['pelacakan'] as $item): ?>
                    <div class="row mb-3 border-bottom pb-3">
                        <div class="col-md-6">
                            <strong>ID Paket:</strong><br>
                            <?= $item['id_paket'] ?>
                        </div>
                        <div class="col-md-6">
                            <strong>Kurir Pengirim:</strong><br>
                            <?= $item['nama_kurir'] ?? '-' ?>
                        </div>
                        <div class="col-md-6">
                            <strong>Nama Pengirim:</strong><br>
                            <?= $item['nama_pengirim'] ?? '-' ?>
                        </div>
                        <div class="col-md-6">
                            <strong>Nama Penerima:</strong><br>
                            <?= $item['nama_penerima'] ?? '-' ?>
                        </div>
                        <div class="col-md-6">
                            <strong>Asal - Tujuan:</strong><br>
                            <?= $item['kota_asal'] ?? '-' ?> → <?= $item['kota_tujuan'] ?? '-' ?>
                        </div>
                        <div class="col-md-6">
                            <strong>Berat:</strong><br>
                            <?= $item['berat_paket'] ?? '-' ?> kg
                        </div>
                        <div class="col-md-6">
                            <strong>Layanan:</strong><br>
                            <?= $item['layanan'] ?? '-' ?>
                        </div>
                        <div class="col-md-6">
                            <strong>Ongkir:</strong><br>
                            Rp <?= number_format($item['ongkos_kirim'] ?? 0, 0, ',', '.') ?>
                        </div>
                        <div class="col-md-6">
                            <strong>Status Saat Ini:</strong><br>
                            <span class="text-primary fw-bold"><?= $item['status_saat_ini'] ?></span>
                        </div>
                        <div class="col-md-6">
                            <strong>Tanggal Update:</strong><br>
                            <?= $item['tanggal_update'] ?>
                        </div>
                        <div class="col-12">
                            <strong>Keterangan:</strong><br>
                            <?= $item['keterangan'] ?>
                        </div>
                    </div>
                <?php endforeach; ?>

                <form action="<?= BASEURL ?>/pelacakan/updateStatus" method="POST" class="mt-4">
                    <input type="hidden" name="id_paket" value="<?= $item['id_paket'] ?>">

                    <label for="update-status-select" class="form-label">Perbarui Status:</label>
                    <div class="row g-3 align-items-end">
                        <div class="col-sm-6">
                            <select name="status_saat_ini" id="update-status-select" class="form-select">
                                <option value="Pickup">Pickup</option>
                                <option value="Dalam Pengantaran">Dalam Pengantaran</option>
                                <option value="Transit">Transit</option>
                                <option value="Terkirim">Terkirim</option>
                            </select>
                        </div>
                        <div class="col-sm-auto">
                            <button type="submit" class="btn btn-success w-100">Update Status</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php elseif (isset($data['pelacakan'])): ?>
            <div class="alert alert-danger mt-4">
                Data tidak ditemukan untuk ID Paket <strong><?= $id_paket ?? '' ?></strong>.
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>
