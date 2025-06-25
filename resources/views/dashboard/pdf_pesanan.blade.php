<!DOCTYPE html>
<html>
<head>
    <title>Data Pesanan</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background-color: #f2f2f2; }
        h4 { text-align: center; }
    </style>
</head>
<body>
    <h4>Data Pesanan</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengunjung</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Tanggal Kunjungan</th>
                <th>Jumlah Pengunjung</th>
                <th>Nama Paket</th>
                <th>Catatan Tambahan</th>
                <th>Status Pesanan</th>
                <th>Dibuat Pada</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataPesanan as $index => $pesanan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pesanan->nama_pengunjung }}</td>
                <td>{{ $pesanan->no_hp }}</td>
                <td>{{ $pesanan->alamat }}</td>
                <td>{{ $pesanan->tanggal_kunjungan }}</td>
                <td>{{ $pesanan->jumlah_pengunjung }}</td>
                <td>{{ $pesanan->nama_paket }}</td>
                <td>{{ $pesanan->catatan_tambahan }}</td>
                <td>{{ $pesanan->status ?? '-' }}</td>
                <td>{{ $pesanan->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
