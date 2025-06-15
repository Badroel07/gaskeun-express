</main>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const modalTitle = document.getElementById('formModalLabel');
    const form = document.querySelector('#formModal form');
    const idInput = document.getElementById('id_kota');
    const namaInput = document.getElementById('nama_kota');
    const zonaInput = document.getElementById('zona_kota');
    const tombolUbah = document.querySelectorAll('.tampilModalUbahKota');

    tombolUbah.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.dataset.id;

            // Ganti judul modal dan action form
            modalTitle.textContent = 'Ubah Data Kota';
            form.action = '<?= BASEURL; ?>/kota/ubah';

            // Ambil data kota berdasarkan ID via AJAX
            fetch('<?= BASEURL; ?>/kota/getUbah', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id=' + encodeURIComponent(id)
            })
            .then(response => response.json())
            .then(data => {
                // Isi form dengan data yang diambil
                idInput.value = data.id_kota;
                namaInput.value = data.nama_kota;
                zonaInput.value = data.zona_kota;
            })
            .catch(err => {
                alert('Gagal mengambil data kota.');
                console.error(err);
            });
        });
    });

    // Tombol Tambah Data, reset form
    document.getElementById('tombolTambahData').addEventListener('click', function () {
        modalTitle.textContent = 'Tambah Data Kota';
        form.action = '<?= BASEURL; ?>/kota/tambah';
        idInput.value = '';
        namaInput.value = '';
        zonaInput.value = '';
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const modalTitle = document.getElementById('formModalLabel');
    const form = document.querySelector('#formModal form');
    const idInput = document.getElementById('id_layanan');
    const namaInput = document.getElementById('nama_layanan');
    const deskripsiInput = document.getElementById('deskripsi_layanan');
    const tombolUbah = document.querySelectorAll('.tampilModalUbahLayanan');

    tombolUbah.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.dataset.id;

            modalTitle.textContent = 'Ubah Data Layanan';
            form.action = '<?= BASEURL; ?>/layanan/ubah';

            fetch('<?= BASEURL; ?>/layanan/getUbah', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id=' + encodeURIComponent(id)
            })
            .then(response => response.json())
            .then(data => {
                idInput.value = data.id_layanan;
                namaInput.value = data.nama_layanan;
                deskripsiInput.value = data.deskripsi_layanan;
            })
            .catch(err => {
                alert('Gagal mengambil data layanan.');
                console.error(err);
            });
        });
    });

    // Tombol Tambah Data, reset form
    document.getElementById('tombolTambahData').addEventListener('click', function () {
        modalTitle.textContent = 'Tambah Data Layanan';
        form.action = '<?= BASEURL; ?>/layanan/tambah';
        idInput.value = '';
        namaInput.value = '';
        deskripsiInput.value = '';
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const tombolUbah = document.querySelectorAll('.tampilModalUbahTarif');
    const form = document.getElementById('formTarif');
    const modalLabel = document.getElementById('formModalLabel');

    tombolUbah.forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.dataset.id;

            // Ubah action form ke /tarif/ubah
            form.setAttribute('action', '<?= BASEURL ?>/tarif/ubah');

            // Ubah label modal
            modalLabel.textContent = 'Ubah Data Tarif';

            // Ambil data via AJAX
            fetch('<?= BASEURL ?>/tarif/getUbah', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id=' + encodeURIComponent(id)
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('id_tarif').value = data.id_tarif;
                document.getElementById('id_kota_asal').value = data.id_kota_asal;
                document.getElementById('id_kota_tujuan').value = data.id_kota_tujuan;
                document.getElementById('id_layanan').value = data.id_layanan;
                document.getElementById('tarif_per_kg').value = data.tarif_per_kg;
            });
        });
    });

    // Tombol tambah diklik, reset form
    const tombolTambah = document.getElementById('tombolTambahData');
    tombolTambah.addEventListener('click', function () {
        form.setAttribute('action', '<?= BASEURL ?>/tarif/tambah');
        modalLabel.textContent = 'Tambah Data Tarif';
        form.reset();
    });
});
</script>
</body>

</html>