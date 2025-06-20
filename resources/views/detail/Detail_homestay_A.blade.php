<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homestay (A)</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

</head>
<body class="bg-cover bg-center bg-no-repeat min-h-screen flex items-center justify-center relative" style="background-image: url('assets/images/background-homestay.jpg');">


    <!-- Konten Paket -->
    <div class="bg-white p-8 rounded-lg shadow-md max-w-lg w-full">
        <h1 class="text-3xl font-bold mb-4">Homestay (A)</h1>
        <p class="text-lg mb-4">{{ $homestay->deskripsi }}</p>
        
        <div class="bg-gray-50 p-4 rounded-lg mb-6">
            <h2 class="text-2xl font-bold mb-2">Fasilitas</h2>
            <ul class="list-disc list-inside">
                <li>Kamar Tidur</li>
                <li>Kamar Mandi</li>
                <li>Dapur</li>
                
            </ul>
        </div>

        <h2 class="text-2xl font-bold mb-2">Harga</h2>
        <p class="mb-6">Mulai dari: <span class="font-bold text-red-600">Rp {{ number_format($homestay->harga_homestay, 0, ',', '.') }}/Malam</span></p>

        <div class="flex justify-between">
            <a href="/homestay" class="bg-red-500 text-white px-4 py-2 rounded-lg">Kembali</a>
            <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Pesan Paket</button>

        </div>
    </div>

<!-- Modal -->
<div id="modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
        <button onclick="closeModal()" class="absolute top-2 right-3 text-gray-500 hover:text-red-600 text-xl">&times;</button>
        <h2 class="text-2xl font-bold mb-4">Form Pemesanan Homestay</h2>
        
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

        <form action="/form-homestay" method="POST">
            @csrf

            <input type="hidden" name="id_homestay" value="{{ $homestay->id }}">


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
                @php
                    $user = auth('akun')->user();
                @endphp
                @if($user)
                    <input type="text" name="alamat" id="alamat" class="w-full border rounded px-3 py-2" value="{{ $user->alamat }}" readonly>
                @else
                    <input type="text" name="alamat" id="alamat" class="w-full border rounded px-3 py-2" required>
                @endif
            </div>

                <div class="mb-4">
                    <label for="check_in" class="block font-medium">Tanggal Check-in</label>
                    <input type="text" name="check_in" id="check_in" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label for="check_out" class="block font-medium">Tanggal Check-out</label>
                    <input type="text" name="check_out" id="check_out" class="w-full border rounded px-3 py-2" required>
                </div>

            <button type="submit" class="bg-blue-600 text-white w-full py-2 rounded hover:bg-blue-700 transition">Kirim Pesanan</button>
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


    flatpickr("#check_in", {
        dateFormat: "Y-m-d",
        minDate: "today"
    });

    flatpickr("#check_out", {
        dateFormat: "Y-m-d",
        minDate: "today"
    });


</script>



</body>
</html>
