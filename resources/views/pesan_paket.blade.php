<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pemesanan</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f4f8;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background-color: #fff;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      max-width: 450px;
      width: 100%;
      position: relative;
    }

    .close {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 22px;
      font-weight: bold;
      cursor: pointer;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: 500;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }

    button {
      background-color: #007bff;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      width: 100%;
      cursor: pointer;
      transition: 0.3s ease;
    }

    button:hover {
      background-color: #0056b3;
    }

    .alert {
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 8px;
    }

    .alert-success {
      background-color: #d4edda;
      color: #155724;
    }

    .alert-danger {
      background-color: #f8d7da;
      color: #721c24;
    }
  </style>

  <!-- Flatpickr CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body>

  <div class="container">
    <span class="close" onclick="window.close()">&times;</span>
    <h2>Form Pemesanan Paket</h2>

    <!-- Notif -->
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Form -->
    <form method="POST" action="/form-kunjungan">
      @csrf
      <label for="nama_pengunjung">Nama Lengkap</label>
      <input type="text" id="nama_pengunjung" name="nama_pengunjung" required>

      <label for="no_hp">Nomor Telepon</label>
      <input type="text" id="no_hp" name="no_hp" required>

      <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
      <input type="text" id="tanggal_kunjungan" name="tanggal_kunjungan" required>

      <label for="paket">Pilih Paket Wisata</label>
      <select id="paket" name="paket" required>
        <option value="">-- Pilih Paket --</option>
        <option value="Paket Edukasi">Paket 1 Hari (A)</option>
        <option value="Paket Budaya">Paket 1 Hari (B)</option>
        <option value="Paket Camping">Paket 2 Hari 1 Malam</option>
        <option value="Paket Adventure">Paket 3 Hari 2 Malam</option>
      </select>

      <label for="jumlah_tamu">Jumlah Tamu</label>
      <input type="number" id="jumlah_tamu" name="jumlah_tamu" min="1" max="10" required>

      <label for="catatan">Catatan Tambahan</label>
      <textarea id="catatan" name="catatan" placeholder="Contoh: Alergi makanan, permintaan khusus, dll."></textarea>

      <button type="submit">Pesan Sekarang</button>
    </form>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      fetch('/api/tanggal-penuh')
        .then(res => res.json())
        .then(tanggal => {
          flatpickr("#tanggal_kunjungan", {
            dateFormat: "Y-m-d",
            disable: tanggal,
            minDate: "today"
          });
        });
    });
  </script>

</body>
</html>
