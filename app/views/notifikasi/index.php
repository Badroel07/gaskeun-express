<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3 pb-1-5">
        <h2 class="h5 fw-bold text-dark mb-0"> Log Riwayat Aktivitas
        </h2>
        <form action="<?= BASEURL; ?>/notifikasi/hapusSemua" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus SEMUA riwayat aktivitas? Tindakan ini tidak dapat dibatalkan.');">
            <button type="submit" class="btn btn-danger rounded-pill px-3 py-1-5 shadow-sm">
                <i class="bi bi-trash-fill me-1"></i> Hapus Semua Riwayat
            </button>
        </form>
    </div>

    <div class="d-flex flex-column gap-3 w-100">
        <?php if (!empty($data['notifikasi'])): ?>
            <?php foreach ($data['notifikasi'] as $notifikasi): ?>
                <?php
                $log_type = str_replace('_', ' ', $notifikasi['status']);
                $action_type = $notifikasi['aksi'];

                // Define colors and icons based on action type
                $card_class = 'bg-light text-dark'; // Default
                $icon_class = 'bi bi-info-circle-fill text-secondary';
                $action_text_class = 'text-muted';

                if ($action_type === 'CREATE') {
                    $card_class = 'bg-gradient-success-light text-dark border-success-subtle';
                    $icon_class = 'bi bi-plus-circle-fill text-success';
                    $action_text_class = 'text-success fw-bold';
                } elseif ($action_type === 'UPDATE') {
                    $card_class = 'bg-gradient-warning-light text-dark border-warning-subtle';
                    $icon_class = 'bi bi-arrow-repeat text-warning';
                    $action_text_class = 'text-warning fw-bold';
                } elseif ($action_type === 'DELETE') {
                    $card_class = 'bg-gradient-danger-light text-dark border-danger-subtle';
                    $icon_class = 'bi bi-trash-fill text-danger';
                    $action_text_class = 'text-danger fw-bold';
                } elseif ($action_type === 'LOGIN' || $action_type === 'LOGOUT') {
                    $card_class = 'bg-gradient-info-light text-dark border-info-subtle';
                    $icon_class = 'bi bi-person-circle text-info';
                    $action_text_class = 'text-info fw-bold';
                }
                // Add more conditions for other specific statuses if needed
                ?>
                <div class="p-3 rounded-3 shadow-sm border <?= $card_class ?> animate__animated animate__fadeInUp animate__faster">
                    <div class="d-flex align-items-start mb-2">
                        <i class="<?= $icon_class ?> fs-4 me-3 mt-1"></i>
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold text-capitalize <?= $action_text_class ?>">
                                <?= htmlspecialchars($log_type) ?>
                            </h6>
                            <p class="mb-0 small text-muted">
                                Aksi: <strong class="<?= $action_text_class ?>"><?= htmlspecialchars($action_type) ?></strong>
                            </p>
                        </div>
                        <small class="text-muted text-end ms-3 fst-italic">
                            <i class="bi bi-calendar me-1"></i> <?= date('d M Y', strtotime($notifikasi['tanggal'])) ?><br>
                            <i class="bi bi-clock me-1"></i> <?= date('H:i', strtotime($notifikasi['tanggal'])) ?> WIB
                        </small>
                    </div>
                    <p class="mb-0 text-dark small">
                        Detail: <?= htmlspecialchars($notifikasi['deskripsi'] ?? 'Tidak ada deskripsi.') ?>
                    </p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-info text-center py-4 rounded-4 shadow-sm animate__animated animate__fadeIn" role="alert">
                <i class="bi bi-archive-fill me-2 fs-4"></i> Tidak ada riwayat aktivitas terbaru.
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
    /* General Styling (consistent with previous pages) */
    .container {
        padding-top: 2rem;
        padding-bottom: 2rem;
    }

    .fw-bold {
        font-weight: 700 !important;
    }

    .fw-semibold {
        font-weight: 600 !important;
    }

    .text-dark {
        color: var(--bs-dark) !important;
        /* Ensure text is dark on light backgrounds */
    }

    /* Custom Gradient Backgrounds for Log Entries */
    .bg-gradient-success-light {
        background: linear-gradient(90deg, #d4edda, #e2ffe7);
        /* Soft green gradient */
    }

    .bg-gradient-warning-light {
        background: linear-gradient(90deg, #fff3cd, #fff8e2);
        /* Soft yellow gradient */
    }

    .bg-gradient-danger-light {
        background: linear-gradient(90deg, #f8d7da, #ffe7e9);
        /* Soft red gradient */
    }

    .bg-gradient-info-light {
        background: linear-gradient(90deg, #d1ecf1, #e0f6f9);
        /* Soft blue gradient */
    }

    /* Default light background for other logs */
    .bg-light {
        background-color: #f8f9fa !important;
    }

    /* Borders for gradient cards */
    .border-success-subtle {
        border-color: var(--bs-success-border-subtle) !important;
    }

    .border-warning-subtle {
        border-color: var(--bs-warning-border-subtle) !important;
    }

    .border-danger-subtle {
        border-color: var(--bs-danger-border-subtle) !important;
    }

    .border-info-subtle {
        border-color: var(--bs-info-border-subtle) !important;
    }

    /* Log Entry Styling */
    .p-3.rounded-3 {
        padding: 1.25rem !important;
        /* Slightly more padding */
        border-radius: 0.75rem !important;
        /* Softer rounded corners */
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .p-3.rounded-3:hover {
        transform: translateY(-3px);
        /* Subtle lift on hover */
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1) !important;
        /* More pronounced shadow on hover */
    }

    .log-icon {
        font-size: 1.5rem;
        /* Larger icons */
        flex-shrink: 0;
        /* Prevent icon from shrinking */
    }

    .text-capitalize {
        text-transform: capitalize;
    }

    .fst-italic {
        font-style: italic;
    }

    .text-muted.small {
        font-size: 0.85em;
        /* Slightly larger small text */
    }

    /* Alert Styling for No Data */
    .alert.alert-info {
        background-color: #d1ecf1;
        border-color: #bee5eb;
        color: #0c5460;
    }

    /* Animate.css for subtle entry animation */
    .animate__animated.animate__fadeInUp {
        animation-duration: 0.5s;
    }

    .animate__animated.animate__fadeInUp.animate__faster {
        animation-duration: 0.3s;
        /* Faster animation for individual items */
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">