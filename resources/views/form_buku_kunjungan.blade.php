<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku Kunjungan</title>
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
        <h1 class="text-3xl font-bold mb-4">Buku Kunjungan</h1>
        <p class="text-lg mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia exercitationem, officiis, molestias iste at iure laudantium nesciunt.</p>
        
        <div class="flex justify-between">
            <a href="/" class="bg-red-500 text-white px-4 py-2 rounded-lg">Kembali</a>
            <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Isi Buku Kunjungan</button>

        </div>
    </div>

<!-- Modal -->
<div id="modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
        <button onclick="closeModal()" class="absolute top-2 right-3 text-gray-500 hover:text-red-600 text-xl">&times;</button>
        <h2 class="text-2xl font-bold mb-4">Form Buku Kunjungan</h2>
        
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

        <form action="/form-buku-kunjungan" method="POST">
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
                <label for="alamat" class="block font-medium">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label for="tanggal_kunjungan" class="block font-medium">Tanggal Kunjungan</label>
                <input type="text" name="tanggal_kunjungan" id="tanggal_kunjungan" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label for="jumlah_pengunjung" class="block font-medium">Jumlah pengunjung</label>
                <input type="text" name="jumlah_pengunjung" id="jumlah_pengunjung" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label for="kesan_pesan" class="block font-medium">Kesan dan pesan</label>
                <textarea name="kesan_pesan" id="kesan_pesan" rows="3" class="w-full border rounded px-3 py-2"></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white w-full py-2 rounded hover:bg-blue-700 transition">Kirim</button>
        </form>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById("modal").classList.remove("hidden");
    }

    function closeModal() {
        document.getElementById("modal").classList.add("hidden");
    }

    // Inisialisasi flatpickr untuk input tanggal
    flatpickr("#tanggal_kunjungan", {
        dateFormat: "Y-m-d", // Format tanggal yang dikirim ke backend
        minDate: "today",    
        altInput: true,
        altFormat: "l, d F Y" 
    });
</script>




</body>
</html>
