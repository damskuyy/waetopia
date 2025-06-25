{{-- filepath: resources/views/be/reservasi/pdf.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Detail Reservasi #{{ $reservasi->id }}</title>
    <style>
        body { font-family: 'Arial', sans-serif; margin: 20px; color: #333; }
        .header { text-align: center; margin-bottom: 20px; padding-bottom: 15px; border-bottom: 2px solid #007bff; }
        .header img { width: 120px; margin-bottom: 10px; }
        .header h2 { margin: 0; font-size: 24px; color: #007bff; }
        .header p { margin: 0; font-size: 14px; color: #6c757d; }
        .section { margin-bottom: 20px; }
        .section-title { font-weight: bold; color: #007bff; border-bottom: 1px solid #eee; padding-bottom: 5px; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 10px; text-align: left; }
        th { background-color: #f8f9fa; }
        .total-row { font-weight: bold; background-color: #f8f9fa; }
        .status-badge { display: inline-block; padding: 3px 10px; border-radius: 4px; color: white; font-weight: 500; }
        .footer { margin-top: 30px; text-align: center; font-size: 12px; color: #6c757d; border-top: 1px solid #eee; padding-top: 10px; }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('be/images/logo-panjang.png') }}" alt="Logo Waetopia">
        <h2>Detail Reservasi #{{ $reservasi->id }}</h2>
        <p>Dokumen resmi dari sistem reservasi wisata</p>
    </div>

    <div class="section">
        <div class="section-title">Informasi Pelanggan</div>
        <table>
            <tr>
                <th>Nama</th>
                <td>{{ $reservasi->nama_pelanggan ?? ($reservasi->pelanggan->nama_lengkap ?? '-') }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $reservasi->pelanggan && $reservasi->pelanggan->user ? $reservasi->pelanggan->user->email : '-' }}</td>
            </tr>
            <tr>
                <th>No HP</th>
                <td>{{ $reservasi->pelanggan->no_hp ?? '-' }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $reservasi->pelanggan->alamat ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Informasi Reservasi</div>
        <table>
            <tr>
                <th>Paket Wisata</th>
                <td>{{ $reservasi->paketWisata->nama_paket ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tgl Mulai</th>
                <td>
                    @if($reservasi->tgl_reservasi_wisata)
                        {{ \Carbon\Carbon::parse($reservasi->tgl_reservasi_wisata)->format('d/m/Y H:i') }}
                    @else
                        -
                    @endif
                </td>
            </tr>
            <tr>
                <th>Tgl Selesai</th>
                <td>
                    @if($reservasi->tgl_selesai_reservasi)
                        {{ \Carbon\Carbon::parse($reservasi->tgl_selesai_reservasi)->format('d/m/Y H:i') }}
                    @else
                        -
                    @endif
                </td>
            </tr>
            <tr>
                <th>Jumlah Peserta</th>
                <td>{{ $reservasi->jumlah_peserta }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    <span class="status-badge" style="background-color: 
                        @if($reservasi->status_reservasi_wisata == 'Dipesan') #ffc107
                        @elseif($reservasi->status_reservasi_wisata == 'Dibayar') #007bff
                        @elseif($reservasi->status_reservasi_wisata == 'Selesai') #28a745
                        @else #dc3545 @endif;">
                        {{ $reservasi->status_reservasi_wisata }}
                    </span>
                </td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Rincian Pembayaran</div>
        <table>
            <tr>
                <th>Harga per Pack</th>
                <td>Rp {{ number_format($reservasi->harga, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Subtotal</th>
                <td>Rp {{ number_format($reservasi->subtotal, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Diskon</th>
                <td>
                    @if($reservasi->diskon)
                        {{ $reservasi->diskon->nama_diskon }} ({{ $reservasi->persentase_diskon }}%)
                    @else
                        -
                    @endif
                </td>
            </tr>
            <tr>
                <th>Nilai Diskon</th>
                <td>Rp {{ number_format($reservasi->nilai_diskon, 0, ',', '.') }}</td>
            </tr>
            <tr class="total-row">
                <th>Total Bayar</th>
                <td>Rp {{ number_format($reservasi->total_bayar, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Metode Pembayaran</th>
                <td>{{ $reservasi->metodePembayaran->metode_pembayaran ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Bukti Transfer</div>
        @if(!empty($buktiBase64))
            <img src="{{ $buktiBase64 }}" alt="Bukti Transfer" style="width: 100%; max-width: 300px;">
        @elseif($reservasi->file_bukti_tf)
            <span>Bukti transfer terlampir: {{ basename($reservasi->file_bukti_tf) }}</span>
        @else
            <span>-</span>
        @endif
    </div>

    <div class="footer">
        <p>Dokumen ini dicetak pada {{ now()->format('d F Y H:i') }} dari sistem reservasi wisata</p>
    </div>
</body>
</html>