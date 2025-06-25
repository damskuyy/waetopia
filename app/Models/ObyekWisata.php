<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObyekWisata extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'obyek_wisatas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_wisata',
        'deskripsi_wisata',
        'id_kategori_wisata',
        'fasilitas',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'foto5',
    ];

    /**
     * Get the kategori wisata associated with the obyek wisata.
     */
    public function kategoriWisata()
    {
        return $this->belongsTo(KategoriWisata::class, 'id_kategori_wisata');
    }
}
