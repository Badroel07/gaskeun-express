<div class="d-flex flex-column gap-3 w-100">
    <?php foreach($data['notifikasi'] as $notifikasi): ?>
        <?php
            // Bootstrap alert class based on action
            $alertClass = 'bg-dark text-white border-dark'; // Default
            if ($notifikasi['aksi'] === 'CREATE') {
                $alertClass = 'bg-success text-white border-success';
            } elseif ($notifikasi['aksi'] === 'UPDATE') {
                $alertClass = 'bg-warning text-dark border-warning';
            } elseif ($notifikasi['aksi'] === 'DELETE') {
                $alertClass = 'bg-danger text-white border-danger';
            }
        ?>
        <div class="p-3 rounded shadow-sm border <?= $alertClass ?>">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <p class="mb-0 fw-semibold text-capitalize">
                    <?= str_replace('_', ' ', $notifikasi['status']) ?>
                </p>
                <small class="text-light-emphasis">
                    <?= date('d F Y, H:i', strtotime($notifikasi['tanggal'])) ?>
                </small>
            </div>
            <p class="mb-0">
                Notifikasi terkait: <strong><?= $notifikasi['aksi'] ?></strong>
            </p>
        </div>
    <?php endforeach; ?>
</div>
