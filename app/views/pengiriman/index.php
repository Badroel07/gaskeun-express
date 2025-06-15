<div class="container my-2">
    <h2 class="h4 fw-semibold text-dark mb-4">Input Data Pengiriman Paket</h2>
    <?php Flasher::flash(); ?>

    <form id="package-form" action="<?= BASEURL; ?>/pengiriman/tambah" method="POST" class="row g-4">
        <!-- Data Pengirim -->
        <div class="col-md-6">
            <div class="card border">
                <div class="card-body">
                    <h5 class="card-title">Data Pengirim</h5>
                    <div class="mb-3">
                        <label for="sender-name" class="form-label">Nama Pengirim</label>
                        <input type="text" id="sender-name" name="senderName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="sender-address" class="form-label">Alamat Pengirim</label>
                        <input type="text" id="sender-address" name="senderAddress" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="sender-phone" class="form-label">Telepon Pengirim</label>
                        <input type="tel" id="sender-phone" name="senderPhone" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Penerima -->
        <div class="col-md-6">
            <div class="card border">
                <div class="card-body">
                    <h5 class="card-title">Data Penerima</h5>
                    <div class="mb-3">
                        <label for="receiver-name" class="form-label">Nama Penerima</label>
                        <input type="text" id="receiver-name" name="receiverName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="receiver-address" class="form-label">Alamat Penerima</label>
                        <input type="text" id="receiver-address" name="receiverAddress" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="receiver-phone" class="form-label">Telepon Penerima</label>
                        <input type="tel" id="receiver-phone" name="receiverPhone" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Paket -->
        <div class="col-12">
            <div class="card border">
                <div class="card-body">
                    <h5 class="card-title">Data Paket</h5>
                    <div class="row g-3 mb-3">
                        <div class="col-md-3">
                            <label for="package-weight" class="form-label">Berat (Kg)</label>
                            <input type="number" id="package-weight" name="packageWeight" step="0.1" min="0.1" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label for="service-type" class="form-label">Jenis Layanan</label>
                            <select id="service-type" name="serviceType" class="form-select" required>
                                <option value="">Pilih Layanan</option>
                                <?php foreach($data['layanan'] as $layanan): ?>
                                    <option value="<?= $layanan['id_layanan']; ?>"><?= $layanan['nama_layanan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="origin-city" class="form-label">Kota Asal</label>
                            <select id="origin-city" name="originCity" class="form-select" required>
                                <option value="">Pilih Kota Asal</option>
                                <?php foreach($data['kota'] as $kota): ?>
                                    <option value="<?= $kota['id_kota']; ?>"><?= $kota['nama_kota']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="destination-city" class="form-label">Kota Tujuan</label>
                            <select id="destination-city" name="destinationCity" class="form-select" required>
                                <option value="">Pilih Kota Tujuan</option>
                                <?php foreach($data['kota'] as $kota): ?>
                                    <option value="<?= $kota['id_kota']; ?>"><?= $kota['nama_kota']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="shipping-cost" class="form-label">Ongkos Kirim</label>
                        <input type="text" id="shipping-cost" name="shippingCost" class="form-control fw-bold text-end bg-light" readonly value="Rp 0">
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" id="calculate-cost-btn" class="btn btn-primary">Hitung Ongkir</button>
                        <button type="submit" class="btn btn-success">Simpan Pengiriman</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
