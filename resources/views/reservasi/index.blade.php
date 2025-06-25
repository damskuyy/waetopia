@extends('be.master')
@section('navbar')
    @include('be.navbar')
@endsection
@section('sidebar')
    @include('be.sidebar')
@endsection
@section('content')
<div class="container-fluid">
    <div class="card card-default">
        <div class="card-header">
            <h2>Reservasi List</h2>
            <a href="{{ route('reservasi.create') }}" class="btn btn-primary">Tambah Reservasi</a>
        </div>
        <div class="card-body">
            <table id="productsTable" class="table table-hover table-product" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        {{-- <th>Nama Lengkap</th> --}}
                        <th>Email</th>
                        <th>Paket Wisata</th>
                        <th>Tgl Mulai</th>
                        <th>Tgl Selesai</th>
                        <th>Jumlah Peserta</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                        <th>Diskon</th>
                        <th>Nilai Diskon</th>
                        <th>Total Bayar</th>
                        <th>Metode Pembayaran</th>
                        <th>Bukti TF</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservasis as $index => $reservasi)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $reservasi->nama_pelanggan ?? ($reservasi->pelanggan->nama_lengkap ?? '-') }}</td>
                        <td>
                            {{ $reservasi->pelanggan && $reservasi->pelanggan->user ? $reservasi->pelanggan->user->email : '-' }}
                        </td>
                        <td>{{ $reservasi->paketWisata->nama_paket ?? '-' }}</td>
                        <td>
                            @if($reservasi->tgl_reservasi_wisata)
                                {{ \Carbon\Carbon::parse($reservasi->tgl_reservasi_wisata)->format('d/m/Y H:i') }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($reservasi->tgl_selesai_reservasi)
                                {{ \Carbon\Carbon::parse($reservasi->tgl_selesai_reservasi)->format('d/m/Y H:i') }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="text-center">{{ $reservasi->jumlah_peserta }}</td>
                        <td>Rp {{ number_format($reservasi->harga, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($reservasi->subtotal, 0, ',', '.') }}</td>

                        <td>
                            @if($reservasi->diskon)
                                {{ $reservasi->diskon->nama_diskon }} ({{ $reservasi->persentase_diskon }}%)
                            @else
                                -
                            @endif
                        </td>
                        <td>Rp {{ number_format($reservasi->nilai_diskon, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($reservasi->total_bayar, 0, ',', '.') }}</td>
                        <td>{{ $reservasi->metodePembayaran->metode_pembayaran ?? '-' }}</td>
                        <td>
                            @if($reservasi->file_bukti_tf)
                                <a href="{{ Storage::url($reservasi->file_bukti_tf) }}" target="_blank">Lihat</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <span class="badge 
                                @if($reservasi->status_reservasi_wisata == 'pesan') badge-warning
                                @elseif($reservasi->status_reservasi_wisata == 'dibayar') badge-primary
                                @elseif($reservasi->status_reservasi_wisata == 'selesai') badge-success
                                @else badge-danger @endif">
                                {{ ucfirst($reservasi->status_reservasi_wisata) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('reservasi.show', $reservasi->id) }}" class="mdi mdi-eye" title="Detail"></a>
                            <a href="{{ route('reservasi.edit', $reservasi->id) }}" class="mdi mdi-open-in-new" title="Edit"></a>
                            <a href="{{ route('reservasi.destroy', $reservasi) }}" onclick="hapus(event, this)" class="mdi mdi-close text-danger"></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<form action="" id="delete" method="POST">
    @method('delete')
    @csrf 
</form>
    
<script>
    const body = document.getElementById('body')
    const form = document.getElementById('delete')

    function hapus(event, el){
        event.preventDefault()
        swal({
            title: "Are you sure?",
            text: "Your will delete this package permanently!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
            },
            function(){
                form.setAttribute('action', el.getAttribute('href'))
                form.submit()
            });
    }

    function tampil_pesan(){
        const pesan = "{{session('pesan')}}"

        if(pesan.trim() !== ''){
            swal('Good Job', pesan, 'success')
        }
    }

    body.onload = function(){
        tampil_pesan()
    }
</script>

@endsection
@section('footer')
    @include('be.footer')
@endsection