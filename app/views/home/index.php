<div class="container">
    <h2 class="h4 fw-bold text-dark mb-4 border-bottom pb-2">Ringkasan Dashboard</h2>

    <div class="row g-4 mb-5">
        <?php
        $cards = [
            [
                'title' => 'Total Paket',
                'value' => $data['dashboard'][0]['total_paket'],
                'color_class' => 'card-primary-gradient', // Custom class for gradient
                'icon'  => '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"></path>'
            ],
            [
                'title' => 'Dalam Pengantaran',
                'value' => $data['dashboard'][0]['total_paket_pengantaran'],
                'color_class' => 'card-info-gradient', // Custom class for gradient
                'icon'  => '<path d="M3 13h2v-2H3v2zm0 4h2v-2H3v2zm0-8h2V7H3v2zm4 4h14v-2H7v2zm0 4h14v-2H7v2zm0-8h14V7H7v2z"></path>'
            ],
            [
                'title' => 'Dalam Transit',
                'value' => $data['dashboard'][0]['total_paket_transit'],
                'color_class' => 'card-warning-gradient', // Custom class for gradient
                'icon'  => '<path d="M20 8h-3V6c0-1.1-.9-2-2-2H9c-1.1 0-2 .9-2 2v2H4c-1.1 0-2 .9-2 2v10h20V10c0-1.1-.9-2-2-2zm-5 2H9V6h6v4z"></path>'
            ],
            [
                'title' => 'Paket Terkirim',
                'value' => $data['dashboard'][0]['total_paket_terkirim'],
                'color_class' => 'card-success-gradient', // Custom class for gradient
                'icon'  => '<path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"></path>'
            ]
        ];

        foreach ($cards as $card) :
        ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card text-white h-100 border-0 rounded-4 shadow-lg-hover <?= $card['color_class'] ?>">
                    <div class="card-body d-flex justify-content-between align-items-center p-4">
                        <div>
                            <p class="mb-1 text-uppercase fw-semibold fs-7 opacity-75"><?= $card['title'] ?></p>
                            <h4 class="mb-0 fw-bolder display-6"><?= $card['value'] ?></h4>
                        </div>
                        <div class="ms-3">
                            <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24" class="opacity-50">
                                <?= $card['icon'] ?>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="card rounded-4 shadow-lg border-0">
        <div class="card-body p-4">
            <h5 class="card-title fw-bold text-dark mb-3">Aktivitas Terkini</h5>

            <?php if ($data['dashboard'][0]['total_paket'] == 0) : ?>
                <div class="alert alert-info text-center py-4 rounded-3" role="alert">
                    <i class="bi bi-info-circle-fill me-2"></i> Tidak ada aktivitas terkini untuk ditampilkan.
                </div>
            <?php else : ?>
                <div class="list-group list-group-flush">
                    <?php foreach ($data['dashboard'] as $dashboard) : ?>
                        <?php
                        $icon = match ($dashboard['status_saat_ini']) {
                            'Terkirim' => '<path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"></path>',
                            'Transit'  => '<path d="M20 8h-3V6c0-1.1-.9-2-2-2H9c-1.1 0-2 .9-2 2v2H4c-1.1 0-2 .9-2 2v10h20V10c0-1.1-.9-2-2-2zm-5 2H9V6h6v4z"></path>',
                            default    => '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"></path>',
                        };

                        $status_color_class = match ($dashboard['status_saat_ini']) {
                            'Terkirim' => 'text-success',
                            'Transit'  => 'text-warning',
                            'Dalam Pengantaran' => 'text-info',
                            default    => 'text-primary',
                        };
                        ?>
                        <div class="list-group-item list-group-item-action py-3 px-0 border-bottom-dashed">
                            <div class="d-flex align-items-center">
                                <div class="me-3 text-muted">
                                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24"><?= $icon ?></svg>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0 fw-semibold text-dark">
                                        Paket <strong class="text-primary"><?= $dashboard['id_paket'] ?></strong> menuju <?= $dashboard['kota_tujuan'] ?>
                                    </p>
                                    <p class="mb-0 small text-muted">
                                        Status: <strong class="<?= $status_color_class ?>"><?= $dashboard['status_saat_ini'] ?></strong> – <?= $dashboard['tanggal_update'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    /* General Container and Text Styling */
    .container {
        padding-top: 2rem;
        padding-bottom: 2rem;
    }

    .fw-bolder {
        font-weight: 900 !important; /* Extra bold for numbers */
    }

    .fs-7 {
        font-size: 0.85rem !important; /* Slightly smaller font for card titles */
    }

    /* Card Styling */
    .card {
        border: none; /* Remove default card borders */
    }

    .rounded-4 {
        border-radius: 1.5rem !important; /* More rounded corners */
    }

    .shadow-lg-hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important; /* Default shadow */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .shadow-lg-hover:hover {
        transform: translateY(-5px); /* Lift effect on hover */
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.25) !important; /* Stronger shadow on hover */
    }

    /* Custom Card Gradients */
    .card-primary-gradient {
        background: linear-gradient(45deg, #007bff, #0056b3);
    }

    .card-info-gradient {
        background: linear-gradient(45deg, #17a2b8, #0f6674);
    }

    .card-warning-gradient {
        background: linear-gradient(45deg, #ffc107, #d39e00);
        color: #343a40 !important; /* Darker text for better contrast on light yellow */
    }

    .card-success-gradient {
        background: linear-gradient(45deg, #28a745, #1e7e34);
    }

    /* Activity Log Styling */
    .list-group-item-action {
        transition: background-color 0.2s ease, transform 0.1s ease;
    }

    .list-group-item-action:hover {
        background-color: #f8f9fa; /* Lighter hover background */
        transform: translateX(3px); /* Subtle slide on hover */
    }

    .border-bottom-dashed {
        border-bottom: 1px dashed rgba(0, 0, 0, 0.1) !important; /* Dashed line for separation */
    }

    /* Adjusting last item's border */
    .list-group-item:last-child {
        border-bottom: none !important;
    }

    /* Icon styling in activity log */
    .list-group-item svg {
        opacity: 0.7; /* Slightly faded icons */
    }
</style>