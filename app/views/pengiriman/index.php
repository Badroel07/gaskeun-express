<div class="container">
    <h2 class="h4 fw-bold text-dark mb-4 border-bottom pb-2">Input Data Pengiriman Paket</h2>
    <?php Flasher::flash(); ?>

    <form id="package-form" action="<?= BASEURL; ?>/pengiriman/tambah" method="POST" class="row g-4">
        <div class="col-md-6">
            <div class="card rounded-4 shadow-lg border-0 h-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-bold text-dark mb-4 pb-2 border-bottom">
                        <i class="bi bi-person-fill me-2 text-primary"></i>Data Pengirim
                    </h5>
                    <div class="mb-3">
                        <label for="sender-name" class="form-label text-muted fw-semibold">Nama Pengirim</label>
                        <input type="text" id="sender-name" name="senderName" class="form-control form-control-lg rounded-pill shadow-sm" placeholder="Nama Lengkap Pengirim" required>
                    </div>
                    <div class="mb-3">
                        <label for="sender-address" class="form-label text-muted fw-semibold">Alamat Pengirim</label>
                        <input type="text" id="sender-address" name="senderAddress" class="form-control form-control-lg rounded-pill shadow-sm" placeholder="Alamat Lengkap Pengirim" required>
                    </div>
                    <div class="mb-3">
                        <label for="sender-phone" class="form-label text-muted fw-semibold">Telepon Pengirim</label>
                        <input type="tel" id="sender-phone" name="senderPhone" class="form-control form-control-lg rounded-pill shadow-sm" placeholder="Nomor Telepon Aktif" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card rounded-4 shadow-lg border-0 h-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-bold text-dark mb-4 pb-2 border-bottom">
                        <i class="bi bi-person-check-fill me-2 text-success"></i>Data Penerima
                    </h5>
                    <div class="mb-3">
                        <label for="receiver-name" class="form-label text-muted fw-semibold">Nama Penerima</label>
                        <input type="text" id="receiver-name" name="receiverName" class="form-control form-control-lg rounded-pill shadow-sm" placeholder="Nama Lengkap Penerima" required>
                    </div>
                    <div class="mb-3">
                        <label for="receiver-address" class="form-label text-muted fw-semibold">Alamat Penerima</label>
                        <input type="text" id="receiver-address" name="receiverAddress" class="form-control form-control-lg rounded-pill shadow-sm" placeholder="Alamat Lengkap Penerima" required>
                    </div>
                    <div class="mb-3">
                        <label for="receiver-phone" class="form-label text-muted fw-semibold">Telepon Penerima</label>
                        <input type="tel" id="receiver-phone" name="receiverPhone" class="form-control form-control-lg rounded-pill shadow-sm" placeholder="Nomor Telepon Aktif" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card rounded-4 shadow-lg border-0">
                <div class="card-body p-4">
                    <h5 class="card-title fw-bold text-dark mb-4 pb-2 border-bottom">
                        <i class="bi bi-box-fill me-2 text-info"></i>Data Paket
                    </h5>
                    <div class="row g-4 mb-4">
                        <div class="col-md-3">
                            <label for="package-weight" class="form-label text-muted fw-semibold">Berat (Kg)</label>
                            <div class="input-group input-group-lg">
                                <input type="number" id="package-weight" name="packageWeight" step="0.1" min="0.1" class="form-control rounded-start-pill shadow-sm" placeholder="Contoh: 1.5" required>
                                <span class="input-group-text bg-light border-start-0 rounded-end-pill text-muted">Kg</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="service-type" class="form-label text-muted fw-semibold">Jenis Layanan</label>
                            <select id="service-type" name="serviceType" class="form-select form-select-lg rounded-pill shadow-sm" required>
                                <option value="" disabled selected>Pilih Layanan</option>
                                <?php foreach($data['layanan'] as $layanan): ?>
                                    <option value="<?= $layanan['id_layanan']; ?>"><?= $layanan['nama_layanan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="origin-city" class="form-label text-muted fw-semibold">Kota Asal</label>
                            <select id="origin-city" name="originCity" class="form-select form-select-lg rounded-pill shadow-sm" required>
                                <option value="" disabled selected>Pilih Kota Asal</option>
                                <?php foreach($data['kota'] as $kota): ?>
                                    <option value="<?= $kota['id_kota']; ?>"><?= $kota['nama_kota']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="destination-city" class="form-label text-muted fw-semibold">Kota Tujuan</label>
                            <select id="destination-city" name="destinationCity" class="form-select form-select-lg rounded-pill shadow-sm" required>
                                <option value="" disabled selected>Pilih Kota Tujuan</option>
                                <?php foreach($data['kota'] as $kota): ?>
                                    <option value="<?= $kota['id_kota']; ?>"><?= $kota['nama_kota']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="shipping-cost" class="form-label text-muted fw-semibold">Ongkos Kirim Estimasi</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-light border-end-0 rounded-start-pill text-muted">Rp</span>
                            <input type="text" id="shipping-cost" name="shippingCost" class="form-control fw-bold text-end bg-light border-start-0 rounded-end-pill" readonly value="0">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-3">
                        <button type="button" id="calculate-cost-btn" class="btn btn-primary-gradient rounded-pill px-4 py-2 shadow-sm">
                            <i class="bi bi-calculator me-2"></i> Hitung Ongkir
                        </button>
                        <button type="submit" class="btn btn-success-gradient rounded-pill px-4 py-2 shadow-sm">
                            <i class="bi bi-send-fill me-2"></i> Simpan Pengiriman
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    /* General Styling */
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

    /* Card Styling */
    .card.rounded-4 {
        border-radius: 1.5rem !important;
    }

    .shadow-lg {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }

    .card-title {
        font-size: 1.25rem;
    }

    /* Form Control Styling */
    .form-control-lg,
    .form-select-lg {
        height: calc(3.5rem + 2px); /* Larger input fields */
        padding: 0.75rem 1.5rem;
        font-size: 1.1rem;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
    }

    .rounded-pill {
        border-radius: 50rem !important;
    }

    .rounded-start-pill {
        border-top-left-radius: 50rem !important;
        border-bottom-left-radius: 50rem !important;
    }

    .rounded-end-pill {
        border-top-right-radius: 50rem !important;
        border-bottom-right-radius: 50rem !important;
    }

    /* Input Group Addons */
    .input-group-text {
        background-color: var(--bs-light);
        color: var(--bs-muted);
        border: 1px solid var(--bs-border-color);
        padding: 0.75rem 1rem;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
    }

    /* Gradient Buttons */
    .btn-primary-gradient {
        background: linear-gradient(45deg, #007bff, #0056b3);
        color: white;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-primary-gradient:hover {
        background: linear-gradient(45deg, #0056b3, #004085);
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(0, 123, 255, 0.3) !important;
    }

    .btn-success-gradient {
        background: linear-gradient(45deg, #28a745, #1e7e34);
        color: white;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-success-gradient:hover {
        background: linear-gradient(45deg, #1e7e34, #155d28);
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(40, 167, 69, 0.3) !important;
    }

    /* Flasher Message Styling (Optional, adjust if Flasher CSS is separate) */
    .alert {
        border-radius: 0.75rem;
        box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
        font-weight: 500;
    }

    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }

    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
    }

</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const calculateBtn = document.getElementById('calculate-cost-btn');
    const weightInput = document.getElementById('package-weight');
    const serviceSelect = document.getElementById('service-type');
    const originSelect = document.getElementById('origin-city');
    const destinationSelect = document.getElementById('destination-city');
    const costDisplay = document.getElementById('shipping-cost');

    // Function to format currency
    function formatRupiah(amount) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(amount);
    }

    // Initial display of shipping cost
    costDisplay.value = formatRupiah(0);

    calculateBtn.addEventListener('click', function () {
        const berat = parseFloat(weightInput.value);
        const idLayanan = serviceSelect.value;
        const idKotaAsal = originSelect.value;
        const idKotaTujuan = destinationSelect.value;

        if (isNaN(berat) || berat <= 0 || !idLayanan || !idKotaAsal || !idKotaTujuan) {
            alert("Harap lengkapi semua data paket (Berat, Jenis Layanan, Kota Asal, dan Kota Tujuan) dengan benar.");
            return;
        }

        // Show a loading state if desired, e.g., disable button, show spinner
        calculateBtn.disabled = true;
        calculateBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Menghitung...';

        fetch("<?= BASEURL; ?>/pengiriman/getTarif", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `id_layanan=${idLayanan}&id_kota_asal=${idKotaAsal}&id_kota_tujuan=${idKotaTujuan}`
        })
        .then(response => response.json())
        .then(data => {
            if (data && data.tarif_per_kg) {
                const total = berat * parseFloat(data.tarif_per_kg);
                costDisplay.value = formatRupiah(total);
            } else {
                costDisplay.value = formatRupiah(0);
                alert("Tarif tidak ditemukan untuk kombinasi kota dan layanan yang dipilih.");
            }
        })
        .catch(error => {
            console.error("Error fetching tarif:", error);
            costDisplay.value = formatRupiah(0);
            alert("Terjadi kesalahan saat menghubungi server untuk menghitung ongkos kirim.");
        })
        .finally(() => {
            // Re-enable button and restore text
            calculateBtn.disabled = false;
            calculateBtn.innerHTML = '<i class="bi bi-calculator me-2"></i> Hitung Ongkir';
        });
    });

    // Optional: Recalculate on input change if desired, though explicit button is clearer for complex forms
    // [weightInput, serviceSelect, originSelect, destinationSelect].forEach(input => {
    //     input.addEventListener('change', () => {
    //         costDisplay.value = formatRupiah(0); // Reset cost when inputs change
    //     });
    // });
});
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">