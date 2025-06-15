<div class="space-y-6 w-full">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Input Data Pengiriman Paket</h2>
    <form id="package-form" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-200">
            <h3 class="text-xl font-medium text-gray-700 mb-4">Data Pengirim</h3>
            <div class="mb-4">
                <label for="sender-name" class="block text-sm font-medium text-gray-700 mb-1">Nama Pengirim</label>
                <input type="text" id="sender-name" name="senderName" class="w-full p-3 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div class="mb-4">
                <label for="sender-address" class="block text-sm font-medium text-gray-700 mb-1">Alamat Pengirim</label>
                <input type="text" id="sender-address" name="senderAddress" class="w-full p-3 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div class="mb-4">
                <label for="sender-phone" class="block text-sm font-medium text-gray-700 mb-1">Telepon Pengirim</label>
                <input type="tel" id="sender-phone" name="senderPhone" class="w-full p-3 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
        </div>

        <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-200">
            <h3 class="text-xl font-medium text-gray-700 mb-4">Data Penerima</h3>
            <div class="mb-4">
                <label for="receiver-name" class="block text-sm font-medium text-gray-700 mb-1">Nama Penerima</label>
                <input type="text" id="receiver-name" name="receiverName" class="w-full p-3 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div class="mb-4">
                <label for="receiver-address" class="block text-sm font-medium text-gray-700 mb-1">Alamat Penerima</label>
                <input type="text" id="receiver-address" name="receiverAddress" class="w-full p-3 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div class="mb-4">
                <label for="receiver-phone" class="block text-sm font-medium text-gray-700 mb-1">Telepon Penerima</label>
                <input type="tel" id="receiver-phone" name="receiverPhone" class="w-full p-3 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
        </div>

        <div class="md:col-span-2 bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-200">
            <h3 class="text-xl font-medium text-gray-700 mb-4">Data Paket</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                <div>
                    <label for="package-weight" class="block text-sm font-medium text-gray-700 mb-1">Berat (Kg)</label>
                    <input type="number" id="package-weight" name="packageWeight" step="0.1" min="0.1" class="w-full p-3 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="service-type" class="block text-sm font-medium text-gray-700 mb-1">Jenis Layanan</label>
                    <select id="service-type" name="serviceType" class="w-full p-3 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                        <option value="">Pilih Layanan</option>
                        <option value="Reguler">Reguler</option>
                        <option value="Kilat">Kilat</option>
                        <option value="Ekspress">Ekspress</option>
                    </select>
                </div>
                <div>
                    <label for="origin-city" class="block text-sm font-medium text-gray-700 mb-1">Kota Asal</label>
                    <select id="origin-city" name="originCity" class="w-full p-3 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                        <option value="">Pilih Kota Asal</option>
                        <option value="Jakarta">Jakarta</option>
                        <option value="Surabaya">Surabaya</option>
                        <option value="Bandung">Bandung</option>
                        <option value="Medan">Medan</option>
                        <option value="Makassar">Makassar</option>
                    </select>
                </div>
                <div>
                    <label for="destination-city" class="block text-sm font-medium text-gray-700 mb-1">Kota Tujuan</label>
                    <select id="destination-city" name="destinationCity" class="w-full p-3 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                        <option value="">Pilih Kota Tujuan</option>
                        <option value="Jakarta">Jakarta</option>
                        <option value="Surabaya">Surabaya</option>
                        <option value="Bandung">Bandung</option>
                        <option value="Medan">Medan</option>
                        <option value="Makassar">Makassar</option>
                        <option value="Yogyakarta">Yogyakarta</option>
                        <option value="Semarang">Semarang</option>
                        <option value="Denpasar">Denpasar</option>
                    </select>
                </div>
            </div>
            <div class="mt-4">
                <label for="shipping-cost" class="block text-sm font-medium text-gray-700 mb-1">Ongkos Kirim</label>
                <input type="text" id="shipping-cost" name="shippingCost" class="w-full p-3 bg-gray-100 border border-gray-300 rounded-md font-bold text-lg text-right" readonly value="Rp 0">
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" id="calculate-cost-btn" class="px-6 py-3 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 transition duration-300 shadow-md">Hitung Ongkir</button>
                <button type="submit" class="px-6 py-3 bg-green-600 text-white rounded-md hover:bg-green-700 transition duration-300 shadow-md">Simpan Pengiriman</button>
            </div>
        </div>
    </form>
</div>