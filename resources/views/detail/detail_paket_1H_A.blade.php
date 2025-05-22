<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paket 1 Hari (A)</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen relative">

    <!-- Konten Paket -->
    <div class="bg-white p-8 rounded-lg shadow-md max-w-lg w-full">
        <h1 class="text-3xl font-bold mb-4">Paket 1 Hari (A)</h1>
        <p class="text-lg mb-4">Kegiatan yang tertera dibawah dapat dirubah sesuai kebutuhan dengan menghubungi contact person yang tertera dihalaman contact.</p>
        
        <div class="bg-gray-50 p-4 rounded-lg mb-6">
            <h2 class="text-2xl font-bold mb-2">Kegiatan</h2>
            <ul class="list-disc list-inside">
                <li>Upacara adat penyambutan</li>
                <li>Tandur dan Magawe</li>
                <li>Kesenian Celempung</li>
                <li>Kaulinan Barudak</li>
                <li>Ngagobyag Lauk</li>
                <li>Makan 1 Kali</li>
                <li>Tour Guide</li>
            </ul>
        </div>

        <h2 class="text-2xl font-bold mb-2">Harga</h2>
        <p class="mb-6">Mulai dari: <span class="font-bold text-red-600">Rp 180.000/Orang</span></p>

        <div class="flex justify-between">
            <a href="/paket_wisata" class="bg-red-500 text-white px-4 py-2 rounded-lg">Kembali</a>
            <button onclick="openModal('Paket 1 Hari (A)')" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Pesan Paket</button>

        </div>
    </div>

<!-- Modal -->
<div id="modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
        <button onclick="closeModal()" class="absolute top-2 right-3 text-gray-500 hover:text-red-600 text-xl">&times;</button>
        <h2 class="text-2xl font-bold mb-4">Form Pemesanan Paket</h2>
        
        <!-- Pesan -->
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">{{ session('error') }}</div>
        @endif

        @php
            $user = auth('akun')->user(); // ganti 'akun' kalau kamu pakai guard default
        @endphp

        <form action="/form-kunjungan" method="POST">
            @csrf

            @if($user)
                <input type="hidden" name="nama_pengunjung" id="nama_pengunjung" value="{{ $user->nama }}">
                <div class="mb-4">
                    <p class="font-medium">Nama Pemesan: <span class="text-gray-700 font-semibold">{{ $user->nama }}</span></p>
                </div>
            @else
                <div class="mb-4">
                    <label for="nama_pengunjung" class="block font-medium">Nama Lengkap</label>
                    <input type="text" name="nama_pengunjung" id="nama_pengunjung" class="w-full border rounded px-3 py-2" required>
                </div>
            @endif

            <div class="mb-4">
                <label for="no_hp" class="block font-medium">No Telepon</label>
                @php
                    $user = auth('akun')->user();
                @endphp
                @if($user)
                    <input type="tel" name="no_hp" id="no_hp" class="w-full border rounded px-3 py-2" value="{{ $user->no_hp }}" readonly>
                @else
                    <input type="tel" name="no_hp" id="no_hp" class="w-full border rounded px-3 py-2" required>
                @endif
            </div>

            <div class="mb-4">
                <label for="alamat" class="block font-medium">Alamat</label>
                @if($user)
                    <input type="text" name="alamat" id="alamat" class="w-full border rounded px-3 py-2" value="{{ $user->alamat }}" readonly>
                @else
                    <input type="text" name="alamat" id="alamat" class="w-full border rounded px-3 py-2" required>
                @endif
            </div>

            <div class="mb-4">
                <label for="tanggal_kunjungan" class="block font-medium">Tanggal Kunjungan</label>
                <input type="text" name="tanggal_kunjungan" id="tanggal_kunjungan" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label for="jumlah_pengunjung" class="block font-medium">Jumlah Pengunjung</label>
                <input type="number" name="jumlah_pengunjung" id="jumlah_pengunjung" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label for="nama_paket" class="block font-medium">Nama Paket</label>
                <input type="text" name="nama_paket" id="nama_paket" class="w-full border rounded px-3 py-2" readonly>
            </div>

            <div class="mb-4">
                <label for="nama_homestay" class="block font-medium">Pilih Homestay</label>
                <select id="nama_homestay" name="nama_homestay" class="w-full border rounded px-3 py-2" required>
                    <option value="">-- Pilih Homestay --</option>
                    <option value="Homestay A">Homestay A</option>
                    <option value="Homestay B">Homestay B</option>
                    <option value="Homestay C">Homestay C</option>
                    <option value="Homestay D">Homestay D</option>
                    <option value="Tidak Pesan Homestay ">Tidak Pesan Homestay</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="catatan_tambahan" class="block font-medium">Catatan Tambahan</label>
                <textarea name="catatan_tambahan" id="catatan_tambahan" rows="3" class="w-full border rounded px-3 py-2"></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white w-full py-2 rounded hover:bg-blue-700 transition">Kirim Pesanan</button>
        </form>
    </div>
</div>


<script>
    function openModal(namaPaketTerpilih) {
document.getElementById("modal").classList.remove("hidden");

// Set nilai paket otomatis di form modal
const selectPaket = document.getElementById("nama_paket");
if (selectPaket) {
    selectPaket.value = namaPaketTerpilih;
}
}


    function closeModal() {
        document.getElementById("modal").classList.add("hidden");
    }

    window.addEventListener('click', function(e) {
        const modal = document.getElementById("modal");
        if (e.target === modal) {
            closeModal();
        }
    });

    // Disable tanggal penuh dan munculkan popup jika user pilih tanggal penuh

document.addEventListener('DOMContentLoaded', function () {
    fetch('/api/tanggal-penuh')
        .then(response => response.json())
        .then(disabledDates => {
            flatpickr("#tanggal_kunjungan", {
                dateFormat: "Y-m-d",
                disable: disabledDates,
                minDate: "today",

                onDayCreate: function(dObj, dStr, fp, dayElem) {
                    const date = dayElem.dateObj;
                    const formatted = fp.formatDate(date, "Y-m-d");

                    // Cek apakah tanggal ini termasuk tanggal penuh
                    if (disabledDates.includes(formatted)) {
                        // Tambahkan event click untuk munculkan popup
                        dayElem.addEventListener("click", function(e) {
                            e.preventDefault(); // cegah default behavior

                            closeModal(); // tutup modal jika terbuka
                            Swal.fire({
                                icon: 'warning',
                                title: 'Tanggal Penuh',
                                text: 'Tanggal kunjungan sudah penuh, silakan pilih tanggal lain!',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Oke'
                            });

                        });
                    }
                }
            });
        });
});
</script>


    

</body>
</html>
