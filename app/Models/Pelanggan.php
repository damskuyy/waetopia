<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pelanggans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_lengkap',
        'no_hp',
        'alamat',
        'foto',
        'id_user',
    ];

    /**
     * Get the user associated with the pelanggan.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
