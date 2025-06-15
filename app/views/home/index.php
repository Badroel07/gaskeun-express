<div class="space-y-6 w-full">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Ringkasan Dashboard</h2>

    <!-- Ringkasan Kartu -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <?php
        $cards = [
            [
                'title' => 'Total Paket',
                'value' => $data['dashboard'][0]['total_paket'],
                'color' => 'indigo',
                'icon'  => '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"></path>'
            ],
            [
                'title' => 'Dalam Pengantaran',
                'value' => $data['dashboard'][0]['total_paket_pengantaran'],
                'color' => 'blue',
                'icon'  => '<path d="M3 13h2v-2H3v2zm0 4h2v-2H3v2zm0-8h2V7H3v2zm4 4h14v-2H7v2zm0 4h14v-2H7v2zm0-8h14V7H7v2z"></path>'
            ],
            [
                'title' => 'Dalam Transit',
                'value' => $data['dashboard'][0]['total_paket_transit'],
                'color' => 'yellow',
                'icon'  => '<path d="M20 8h-3V6c0-1.1-.9-2-2-2H9c-1.1 0-2 .9-2 2v2H4c-1.1 0-2 .9-2 2v10h20V10c0-1.1-.9-2-2-2zm-5 2H9V6h6v4z"></path>'
            ],
            [
                'title' => 'Paket Terkirim',
                'value' => $data['dashboard'][0]['total_paket_terkirim'],
                'color' => 'green',
                'icon'  => '<path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"></path>'
            ]
        ];

        foreach ($cards as $card) :
        ?>
            <div class="bg-gradient-to-br from-<?= $card['color'] ?>-500 to-<?= $card['color'] ?>-600 text-white p-6 rounded-xl shadow-lg flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-80"><?= $card['title'] ?></p>
                    <p class="text-xl font-bold mt-1"><?= $card['value'] ?></p>
                </div>
                <svg class="w-7 h-7 opacity-50" fill="currentColor" viewBox="0 0 24 24"><?= $card['icon'] ?></svg>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Aktivitas Terkini -->
    <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-200">
        <h3 class="text-xl font-medium text-gray-700 mb-4">Aktivitas Terkini</h3>

        <?php if ($data['dashboard'][0]['total_paket'] == 0) : ?>
            <div id="recent-activities" class="space-y-4">
                <p class="text-gray-500">Tidak ada aktivitas terkini.</p>
            </div>
        <?php else : ?>
            <?php foreach ($data['dashboard'] as $dashboard) : ?>
                <?php
                // Pilih ikon berdasarkan status
                $icon = match ($dashboard['status_saat_ini']) {
                    'Terkirim' => '<path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"></path>',
                    'Transit'  => '<path d="M20 8h-3V6c0-1.1-.9-2-2-2H9c-1.1 0-2 .9-2 2v2H4c-1.1 0-2 .9-2 2v10h20V10c0-1.1-.9-2-2-2zm-5 2H9V6h6v4z"></path>',
                    default    => '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"></path>',
                };
                ?>

                <div class="flex items-center p-3 bg-white rounded-md shadow-sm border border-gray-200 mb-2">
                    <div class="flex-shrink-0 mr-3">
                        <svg class="w-6 h-6 text-indigo-500" fill="currentColor" viewBox="0 0 24 24"><?= $icon ?></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">
                            Paket <span class="font-bold"><?= $dashboard['id_paket'] ?></span> menuju <?= $dashboard['kota_tujuan'] ?>
                        </p>
                        <p class="text-xs text-gray-600">
                            Status: <span class="font-semibold"><?= $dashboard['status_saat_ini'] ?></span> - <?= $dashboard['tanggal_update'] ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>