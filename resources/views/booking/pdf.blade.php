<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice Reservasi Desa Wisata Waerebo</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; color: #222; background: #f7f7f7; }
        .container { background: #fff; max-width: 800px; margin: 30px auto; padding: 32px 40px 32px 40px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.08);}
        .header { text-align: center; margin-bottom: 32px; }
        .header img { max-height: 70px; }
        .header h2 { margin: 12px 0 4px; color: #3a7bd5; letter-spacing: 2px; }
        .section-title { font-size: 18px; margin-bottom: 12px; color: #3a7bd5; border-left: 5px solid #3a7bd5; padding-left: 10px; font-weight: 600;}
        .details { margin-bottom: 28px; }
        .details-table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .details-table th, .details-table td { border: 1px solid #e0e0e0; padding: 10px 12px; text-align: left; }
        .details-table th { background-color: #f0f6ff; color: #3a7bd5; }
        .highlight { color: #3a7bd5; font-weight: bold; }
        .info-box { background: #f0f6ff; border-left: 5px solid #3a7bd5; padding: 14px 18px; border-radius: 6px; margin-bottom: 18px;}
        .footer { text-align: center; margin-top: 36px; font-size: 13px; color: #888; }
        .bukti-transfer img { max-height: 160px; margin-top: 10px; border: 1px solid #e0e0e0; border-radius: 6px;}
        .badge { display: inline-block; padding: 4px 12px; border-radius: 12px; font-size: 13px; font-weight: 600;}
        .badge-warning { background: #fff3cd; color: #856404; }
        .badge-success { background: #d4edda; color: #155724; }
        .badge-primary { background: #cce5ff; color: #004085; }
        .badge-danger { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <img src="{{ public_path('be/images/logo-panjang.png') }}" alt="Waetopia Logo">
            <h2>INVOICE RESERVASI</h2>
            <p>Desa Wisata Waerebo</p>
        </div>

        <!-- Informasi Pelanggan -->
        <div class="details">
            <div class="section-title">Informasi Pelanggan</div>
            <div class="info-box">
                <strong>Nama:</strong> <span class="highlight">{{ $reservasi->nama_pelanggan }}</span><br>
                {{-- <strong>Email:</strong> {{ $reservasi->email ?? '-' }}<br> --}}
                <strong>No HP:</strong> {{ $reservasi->pelanggan->no_hp ?? '-' }}<br>
                <strong>Alamat:</strong> {{ $reservasi->pelanggan->alamat ?? '-' }}
            </div>
        </div>

        <!-- Detail Reservasi -->
        <div class="details">
            <div class="section-title">Detail Reservasi</div>
            <table class="details-table">
                <tr>
                    <th>Kode Reservasi</th>
                    <td><span class="highlight">RES-{{ str_pad($reservasi->id, 5, '0', STR_PAD_LEFT) }}</span></td>
                </tr>
                <tr>
                    <th>Paket Wisata</th>
                    <td>{{ $reservasi->paketWisata->nama_paket ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tanggal Mulai</th>
                    <td>{{ \Carbon\Carbon::parse($reservasi->tgl_reservasi_wisata)->translatedFormat('l, d F Y H:i') }}</td>
                </tr>
                @if($reservasi->tgl_selesai_reservasi)
                <tr>
                    <th>Tanggal Selesai</th>
                    <td>{{ \Carbon\Carbon::parse($reservasi->tgl_selesai_reservasi)->translatedFormat('l, d F Y H:i') }}</td>
                </tr>
                @endif
                <tr>
                    <th>Status</th>
                    <td>
                        @if($reservasi->status_reservasi_wisata == 'Dipesan')
                            <span class="badge badge-warning">Dipesan</span>
                        @elseif($reservasi->status_reservasi_wisata == 'Dibayar')
                            <span class="badge badge-success">Dibayar</span>
                        @elseif($reservasi->status_reservasi_wisata == 'Selesai')
                            <span class="badge badge-primary">Selesai</span>
                        @else
                            <span class="badge badge-danger">Dibatalkan</span>
                        @endif
                    </td>
                </tr>
            </table>
        </div>

        <!-- Rincian Pembayaran -->
        <div class="details">
            <div class="section-title">Rincian Pembayaran</div>
            <table class="details-table" style="width: 60%; margin: 0 auto; background: #f9fbfd;">
                <tr>
                    <th style="width:45%">Jumlah Peserta</th>
                    <td style="width:55%">{{ $reservasi->jumlah_peserta }} orang</td>
                </tr>
                <tr>
                    <th>Harga per Paket</th>
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
                            {{ $reservasi->persentase_diskon }}% (Rp {{ number_format($reservasi->nilai_diskon, 0, ',', '.') }})
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr style="background:#eaf3ff;">
                    <th style="font-size:16px;">Total Bayar</th>
                    <td style="font-size:16px; font-weight:bold; color:#3a7bd5;">
                        Rp {{ number_format($reservasi->total_bayar, 0, ',', '.') }}
                    </td>
                </tr>
            </table>
        </div>

        <!-- Metode Pembayaran -->
        <div class="details">
            <div class="section-title">Metode Pembayaran</div>
            <div class="info-box">
                <strong>{{ $reservasi->metodePembayaran->metode_pembayaran ?? '-' }}</strong>
                {{ $reservasi->metodePembayaran->nomor_rekening ? '(' . $reservasi->metodePembayaran->nomor_rekening . ')' : '' }}
            </div>
        </div>

        <!-- Bukti Transfer -->
        @if($reservasi->file_bukti_tf)
        <div class="details bukti-transfer">
            <div class="section-title">Bukti Transfer</div>
            <img src="{{ public_path('storage/' . $reservasi->file_bukti_tf) }}" alt="Bukti Transfer">
        </div>
        @endif

        <!-- Footer -->
        <div class="footer">
            <p>Terima kasih telah melakukan reservasi di <strong>Desa Wisata Waerebo</strong>.</p>
            <p>Alamat: Jl. Wisata No. 123, Waetopia, Indonesia</p>
        </div>
    </div>
</body>
</html>