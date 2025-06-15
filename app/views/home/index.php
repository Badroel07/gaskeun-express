<div class="container my-2">
    <h2 class="h4 fw-semibold text-dark mb-4">Ringkasan Dashboard</h2>

    <!-- Ringkasan Kartu -->
    <div class="row g-4 mb-4">
        <?php
        $cards = [
            [
                'title' => 'Total Paket',
                'value' => $data['dashboard'][0]['total_paket'],
                'color' => 'primary',
                'icon'  => '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"></path>'
            ],
            [
                'title' => 'Dalam Pengantaran',
                'value' => $data['dashboard'][0]['total_paket_pengantaran'],
                'color' => 'info',
                'icon'  => '<path d="M3 13h2v-2H3v2zm0 4h2v-2H3v2zm0-8h2V7H3v2zm4 4h14v-2H7v2zm0 4h14v-2H7v2zm0-8h14V7H7v2z"></path>'
            ],
            [
                'title' => 'Dalam Transit',
                'value' => $data['dashboard'][0]['total_paket_transit'],
                'color' => 'warning',
                'icon'  => '<path d="M20 8h-3V6c0-1.1-.9-2-2-2H9c-1.1 0-2 .9-2 2v2H4c-1.1 0-2 .9-2 2v10h20V10c0-1.1-.9-2-2-2zm-5 2H9V6h6v4z"></path>'
            ],
            [
                'title' => 'Paket Terkirim',
                'value' => $data['dashboard'][0]['total_paket_terkirim'],
                'color' => 'success',
                'icon'  => '<path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"></path>'
            ]
        ];

        foreach ($cards as $card) :
        ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card text-white bg-<?= $card['color'] ?> shadow-sm h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1 small text-uppercase"><?= $card['title'] ?></p>
                            <h5 class="mb-0 fw-bold"><?= $card['value'] ?></h5>
                        </div>
                        <svg width="28" height="28" fill="currentColor" viewBox="0 0 24 24"><?= $card['icon'] ?></svg>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Aktivitas Terkini -->
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Aktivitas Terkini</h5>

            <?php if ($data['dashboard'][0]['total_paket'] == 0): ?>
                <p class="text-muted">Tidak ada aktivitas terkini.</p>
            <?php else: ?>
                <?php foreach ($data['dashboard'] as $dashboard): ?>
                    <?php
                    $icon = match ($dashboard['status_saat_ini']) {
                        'Terkirim' => '<path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"></path>',
                        'Transit'  => '<path d="M20 8h-3V6c0-1.1-.9-2-2-2H9c-1.1 0-2 .9-2 2v2H4c-1.1 0-2 .9-2 2v10h20V10c0-1.1-.9-2-2-2zm-5 2H9V6h6v4z"></path>',
                        default    => '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"></path>',
                    };
                    ?>
                    <div class="d-flex align-items-center border rounded p-3 mb-2 shadow-sm bg-light">
                        <div class="me-3 text-primary">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24"><?= $icon ?></svg>
                        </div>
                        <div>
                            <p class="mb-1 fw-semibold text-dark">
                                Paket <strong><?= $dashboard['id_paket'] ?></strong> menuju <?= $dashboard['kota_tujuan'] ?>
                            </p>
                            <p class="mb-0 small text-muted">
                                Status: <strong><?= $dashboard['status_saat_ini'] ?></strong> – <?= $dashboard['tanggal_update'] ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
