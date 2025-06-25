<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'beritas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul',
        'berita',
        'tgl_post',
        'id_kategori_berita',
        'foto',
    ];

    /**
     * Get the kategori berita associated with the berita.
     */
    public function kategoriBerita()
    {
        return $this->belongsTo(KategoriBerita::class, 'id_kategori_berita', 'id');
    }
}
