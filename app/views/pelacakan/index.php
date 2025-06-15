<div class="space-y-6 w-full">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Pelacakan Status Pengiriman</h2>
    <form action="<?= BASEURL; ?>/pelacakan/cari" method="POST" class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-200 mb-6">
        <div class="flex flex-col sm:flex-row items-end gap-4">
            <div class="flex-grow w-full">
                <label for="tracking-id" class="block text-sm font-medium text-gray-700 mb-1">Nomor Resi / ID Paket</label>
                <input type="text" name="tracking_id" id="tracking-id" class="w-full p-3 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="Masukkan ID Paket" required>
            </div>
            <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-300 shadow-md w-full sm:w-auto">Lacak</button>
        </div>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <?php if (isset($data['pelacakan']) && count($data['pelacakan']) > 0): ?>
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <h3 class="text-xl font-medium text-gray-700 mb-4">Hasil Pelacakan ID Paket: <?= $id_paket ?? '' ?></h3>
                <?php foreach ($data['pelacakan'] as $item): ?>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700 border-b border-gray-100 pb-4 mb-4">
                        <div>
                            <p class="font-semibold">ID Paket:</p>
                            <p><?= $item['id_paket'] ?></p>
                        </div>
                        <div>
                            <p class="font-semibold">Kurir Pengirim:</p>
                            <p><?= $item['nama_kurir'] ?? '-' ?></p>
                        </div>
                        <div>
                            <p class="font-semibold">Nama Pengirim:</p>
                            <p><?= $item['nama_pengirim'] ?? '-' ?></p>
                        </div>
                        <div>
                            <p class="font-semibold">Nama Penerima:</p>
                            <p><?= $item['nama_penerima'] ?? '-' ?></p>
                        </div>
                        <div>
                            <p class="font-semibold">Asal - Tujuan:</p>
                            <p><?= $item['kota_asal'] ?? '-' ?> → <?= $item['kota_tujuan'] ?? '-' ?></p>
                        </div>
                        <div>
                            <p class="font-semibold">Berat:</p>
                            <p><?= $item['berat_paket'] ?? '-' ?> kg</p>
                        </div>
                        <div>
                            <p class="font-semibold">Layanan:</p>
                            <p><?= $item['layanan'] ?? '-' ?></p>
                        </div>
                        <div>
                            <p class="font-semibold">Ongkir:</p>
                            <p>Rp <?= number_format($item['ongkos_kirim'] ?? 0, 0, ',', '.') ?></p>
                        </div>
                        <div>
                            <p class="font-semibold">Status Saat Ini:</p>
                            <p class="font-bold text-lg text-indigo-700"><?= $item['status_saat_ini'] ?></p>
                        </div>
                        <div>
                            <p class="font-semibold">Tanggal Update:</p>
                            <p><?= $item['tanggal_update'] ?></p>
                        </div>
                        <div>
                            <p class="font-semibold">Keterangan:</p>
                            <p><?= $item['keterangan'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <form action="<?= BASEURL ?>/pelacakan/updateStatus" method="POST" class="mt-6">
                    <input type="hidden" name="id_paket" value="<?= $item['id_paket'] ?>">

                    <label for="update-status-select" class="block text-sm font-medium text-gray-700 mb-1">Perbarui Status:</label>
                    <div class="flex flex-col sm:flex-row gap-4 items-end">
                        <select name="status_saat_ini" id="update-status-select" class="w-full sm:w-1/2 p-3 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="Pickup">Pickup</option>
                            <option value="Dalam Pengantaran">Dalam Pengantaran</option>
                            <option value="Transit">Transit</option>
                            <option value="Terkirim">Terkirim</option>
                        </select>
                        <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300 shadow-md w-full sm:w-auto">Update Status</button>
                    </div>
                </form>
            </div>
        <?php elseif (isset($data['pelacakan'])): ?>
            <p class="text-red-600 mt-4">Data tidak ditemukan untuk ID Paket <strong><?= $id_paket ?? '' ?></strong>.</p>
        <?php endif; ?>
    <?php endif; ?>
</div>