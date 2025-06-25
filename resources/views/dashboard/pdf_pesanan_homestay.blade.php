<!DOCTYPE html>
<html>
<head>
    <title>Data Pesanan Homestay</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background-color: #f2f2f2; }
        h4 { text-align: center; }
    </style>
</head>
<body>
    <h4>Data Pesanan Homestay</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengunjung</th>
                <th>Alamat</th>
                <th>Lama Tinggal</th>
                <th>Tanggal Check In</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataPesananHomestay as $index => $pesanan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pesanan->nama_pengunjung }}</td>
                <td>{{ $pesanan->alamat }}</td>
                <td>{{ $pesanan->lama_tinggal }}</td>
                <td>{{ $pesanan->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
