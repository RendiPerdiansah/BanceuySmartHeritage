<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Kunjungan</title>
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
        <p class="text-md mb-4 mt-6">Buku kunjungan adalah catatan yang berisi daftar pengunjung yang telah berkunjung, termasuk kesan dan pesan mereka selama kunjungan.</p>

        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative mt-4">
            <h2 class="text-2xl font-bold mb-4">Form Buku Kunjungan</h2>
            
            <!-- Pesan -->
            @if(session('error'))
                <div class="bg-red-100 text-red-800 p-3 rounded mb-4">{{ session('error') }}</div>
            @endif

            @php
                $user = auth('akun')->user(); // ganti 'akun' kalau kamu pakai guard default
                $pemesanan = $pemesanan ?? null;
            @endphp

            <form action="/buku-kunjungan" method="POST">
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
                    <input type="text" name="alamat" id="alamat" class="w-full border rounded px-3 py-2" required value="{{ $pemesanan ? $pemesanan->alamat : '' }}" readonly>
                </div>

                <div class="mb-4">
                    <label for="tanggal_kunjungan" class="block font-medium">Tanggal Kunjungan</label>
                    <input type="text" name="tanggal_kunjungan" id="tanggal_kunjungan" class="w-full border rounded px-3 py-2" required value="{{ $pemesanan ? $pemesanan->tanggal_kunjungan : '' }}" readonly>
                </div>

                <div class="mb-4">
                    <label for="jumlah_pengunjung" class="block font-medium">Jumlah pengunjung</label>
                    <input type="text" name="jumlah_pengunjung" id="jumlah_pengunjung" class="w-full border rounded px-3 py-2" required value="{{ $pemesanan ? $pemesanan->jumlah_pengunjung : '' }}" readonly>
                </div>

                <div class="mb-4">
                    <label for="kesan_pesan" class="block font-medium">Kesan dan pesan</label>
                    <textarea name="kesan_pesan" id="kesan_pesan" rows="3" class="w-full border rounded px-3 py-2" required></textarea>
                    @error('kesan_pesan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-600 text-white w-full py-2 rounded hover:bg-blue-700 transition">Kirim</button>
            </form>
        </div>

<script>
    // Close modal and show notification if success message exists
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
            const notification = document.createElement('div');
            notification.className = 'fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-100 text-green-800 p-3 rounded mb-4 z-50 shadow-lg';
            notification.textContent = "{{ session('success') }}";
            document.body.appendChild(notification);
            setTimeout(() => {
                notification.remove();
            }, 4000);
        @endif
    });

    // Inisialisasi flatpickr untuk input tanggal
    // flatpickr("#tanggal_kunjungan", {
    //     dateFormat: "Y-m-d", // Format tanggal yang dikirim ke backend
    //     minDate: "today",    
    //     altInput: true,
    //     altFormat: "l, d F Y" 
    // });
</script>

</body>
</html>
