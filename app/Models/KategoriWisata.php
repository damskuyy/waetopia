<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriWisata extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kategori_wisatas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kategori_wisata',
    ];

    /**
     * Get the obyek wisatas associated with the kategori wisata.
     */
    public function obyekWisatas()
    {
        return $this->hasMany(ObyekWisata::class, 'id_kategori_wisata');
    }
}
