<div class="space-y-6 w-full">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Kota</h2>
    <ul>
        <?php foreach ($data['kota'] as $kota): ?>
            <li><?= $kota['nama_kota'] ?></li>
        <?php endforeach; ?>
    </ul>
</div>