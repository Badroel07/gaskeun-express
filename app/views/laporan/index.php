<div class="space-y-6 w-full">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Riwayat & Laporan Pengiriman</h2>

    <!-- Filter Form -->
    <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-200 mb-6">
        <form method="GET" action="<?= BASEURL; ?>/laporan" class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label for="kota_tujuan" class="block text-sm font-medium text-gray-700 mb-1">Kota Tujuan</label>
                <select name="kota_tujuan" id="kota_tujuan" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Semua Kota</option>
                    <?php foreach ($data['kota'] as $kota): ?>
                        <option value="<?= $kota['nama_kota'] ?>" <?= ($data['selected_kota'] == $kota['nama_kota']) ? 'selected' : '' ?>>
                            <?= $kota['nama_kota'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" id="status" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Semua Status</option>
                    <option value="Transit" <?= ($data['selected_status'] == 'Transit') ? 'selected' : '' ?>>Transit</option>
                    <option value="Terkirim" <?= ($data['selected_status'] == 'Terkirim') ? 'selected' : '' ?>>Terkirim</option>
                    <option value="Dalam Pengiriman" <?= ($data['selected_status'] == 'Dalam Pengiriman') ? 'selected' : '' ?>>Dalam Pengiriman</option>
                    <option value="Pickup" <?= ($data['selected_status'] == 'Pickup') ? 'selected' : '' ?>>Pickup</option>
                </select>
            </div>
            <div class="self-end">
                <button type="submit" class="w-full bg-indigo-600 text-white p-2 rounded-md hover:bg-indigo-700 transition duration-300">
                    Filter Laporan
                </button>
            </div>
        </form>
    </div>

    <div id="shipment-history" class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h3 class="text-xl font-medium text-gray-700 mb-4">Daftar Pengiriman</h3>
        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200" id="delivery-table">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID Paket</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pengirim</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Penerima</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Asal - Tujuan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Berat (Kg)</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Biaya</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                    </tr>
                </thead>
                <tbody id="package-history-table-body" class="bg-white divide-y divide-gray-200">
                    <?php if (count($data['laporan']) > 0): ?>
                        <?php foreach ($data['laporan'] as $lap): ?>
                            <tr data-city="<?= $lap['kota_tujuan'] ?>" data-status="<?= $lap['status'] ?>">
                                <td class="px-6 py-4 whitespace-nowrap"><?= $lap['id_paket'] ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?= $lap['pengirim'] ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?= $lap['penerima'] ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?= $lap['kota_asal'] ?> → <?= $lap['kota_tujuan'] ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?= $lap['berat_paket'] ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">Rp <?= number_format($lap['ongkos_kirim'], 0, ',', '.') ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?= $lap['status'] ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?= $lap['tanggal'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr id="no-data-row">
                            <td colspan="8" class="px-6 py-4 text-center text-gray-500">Tidak ada data ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>