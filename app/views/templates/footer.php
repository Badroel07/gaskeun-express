</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function setupModalUbah(config) {
            const buttons = document.querySelectorAll(config.buttonClass);
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    // Set label
                    document.getElementById('formModalLabel').textContent = config.title;

                    // Isi input field
                    config.fields.forEach(field => {
                        const value = field.fromDataset ?
                            this.closest('tr').querySelector(`td:nth-child(${field.column})`).dataset[field.fromDataset] :
                            this.closest('tr').querySelector(`td:nth-child(${field.column})`).textContent.trim();
                        document.getElementById(field.id).value = value;
                    });

                    // Set action form
                    document.querySelector('form').action = config.formAction;
                });
            });
        }

        // 🔹 Untuk Kota
        setupModalUbah({
            buttonClass: '.tampilModalUbahKota',
            title: 'Ubah Data Kota',
            formAction: '<?= BASEURL; ?>/kota/ubah',
            fields: [{
                    id: 'id_kota',
                    column: 1,
                    fromDataset: 'id'
                },
                {
                    id: 'nama_kota',
                    column: 2
                },
                {
                    id: 'zona_kota',
                    column: 3
                }
            ]
        });

        // 🔹 Untuk Layanan
        setupModalUbah({
            buttonClass: '.tampilModalUbahLayanan',
            title: 'Ubah Data Layanan',
            formAction: '<?= BASEURL; ?>/layanan/ubah',
            fields: [{
                    id: 'id_layanan',
                    column: 1,
                    fromDataset: 'id'
                },
                {
                    id: 'nama_layanan',
                    column: 2
                },
                {
                    id: 'deskripsi_layanan',
                    column: 3
                }
            ]
        });

        // 🔹 Untuk Tarif
        setupModalUbah({
            buttonClass: '.tampilModalUbahTarif',
            title: 'Ubah Data Tarif',
            formAction: '<?= BASEURL; ?>/tarif/ubah',
            fields: [{
                    id: 'id_tarif',
                    column: 1,
                    fromDataset: 'id'
                },
                {
                    id: 'id_kota_asal',
                    column: 2,
                    fromDataset: 'id'
                },
                {
                    id: 'id_kota_tujuan',
                    column: 3,
                    fromDataset: 'id'
                },
                {
                    id: 'id_layanan',
                    column: 4,
                    fromDataset: 'id'
                },
                {
                    id: 'tarif_per_kg',
                    column: 5
                }
            ]
        });
    });
</script>
</body>

</html>