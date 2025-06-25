<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reservasis';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_pelanggan',
        'id_paket',
        'id_diskon',
        'id_metode_pembayaran',
        'nama_pelanggan', 
        'email',
        'tgl_reservasi_wisata', 
        'tgl_selesai_reservasi', 
        'harga',
        'jumlah_peserta',
        'persentase_diskon',
        'nilai_diskon',
        'subtotal',
        'total_bayar',
        'file_bukti_tf', 
        'status_reservasi_wisata'
    ];

    /**
     * Get the pelanggan associated with the reservasi.
     */
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    /**
     * Get the paket wisata associated with the reservasi.
     */
    public function paketWisata()
    {
        return $this->belongsTo(PaketWisata::class, 'id_paket');
    }

    public function diskon()
    {
        return $this->belongsTo(Diskon::class, 'id_diskon');
    }

    public function metodePembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class, 'id_metode_pembayaran');
    }

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}