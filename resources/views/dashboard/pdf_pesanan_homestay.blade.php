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
                <th>Tanggal Check Out</th>
                <th>Nama Homestay</th>
                <th>Harga Homestay</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Bukti Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataPesananHomestay as $index => $pesanan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pesanan->nama_pengunjung }}</td>
                <td>{{ $pesanan->alamat }}</td>
                <td>{{ $pesanan->lama_tinggal }}</td>
                <td>
                    @php
                        $checkInDate = $pesanan->check_in;
                        if (is_string($checkInDate)) {
                            try {
                                $checkInDate = \Carbon\Carbon::parse($checkInDate);
                            } catch (\Exception $e) {
                                $checkInDate = null;
                            }
                        }
                    @endphp
                    {{ $checkInDate ? $checkInDate->format('d M Y') : '-' }}
                </td>
                <td>
                    @php
                        $checkOutDate = $pesanan->check_out;
                        if (is_string($checkOutDate)) {
                            try {
                                $checkOutDate = \Carbon\Carbon::parse($checkOutDate);
                            } catch (\Exception $e) {
                                $checkOutDate = null;
                            }
                        }
                    @endphp
                    {{ $checkOutDate ? $checkOutDate->format('d M Y') : '-' }}
                </td>
                <td>{{ $pesanan->nama_homestay }}</td>
                <td>{{ number_format($pesanan->harga_homestay, 0, ',', '.') }}</td>
                <td>{{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                <td>{{ $pesanan->status }}</td>
                <td>
                    @if($pesanan->bukti_pembayaran)
                        Bukti Ada
                    @else
                        Belum Ada
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
