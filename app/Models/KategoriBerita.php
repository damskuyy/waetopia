<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kategori_beritas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kategori_berita',
    ];

    /**
     * Get the berita associated with the kategori berita.
     */
    public function beritas()
    {
        return $this->hasMany(Berita::class, 'id_kategori_berita');
    }
}
