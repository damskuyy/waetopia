<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'paket_wisatas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_paket',
        'deskripsi',
        'fasilitas',
        'harga_per_pack',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'foto5',
    ];
}
