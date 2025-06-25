<!DOCTYPE html>
<html>
<head>
    <title>Laporan Omset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 100px;
            margin-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 0;
            font-size: 14px;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #555;
        }
        .total {
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('fe/images/logo-panjang.png') }}" alt="Logo Waetopia">
        <h1>Laporan Omset</h1>
        <p>Periode: {{ $startDate ?? 'Semua Data' }} - {{ $endDate ?? 'Semua Data' }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Reservasi</th>
                <th>Status</th>
                <th>Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            @php
                $grandTotal = 0;
            @endphp
            @foreach ($reservasis as $reservasi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $reservasi->tgl_reservasi_wisata }}</td>
                    <td>{{ ucfirst($reservasi->status_reservasi_wisata) }}</td>
                    <td>Rp {{ number_format($reservasi->total_bayar, 0, ',', '.') }}</td>
                </tr>
                @php
                    $grandTotal += $reservasi->total_bayar;
                @endphp
            @endforeach
            <tr>
                <td colspan="3" class="total">Total Keseluruhan</td>
                <td class="total">Rp {{ number_format($grandTotal, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>&copy; {{ date('Y') }} Waetopia. Semua Hak Dilindungi.</p>
    </div>
</body>
</html>