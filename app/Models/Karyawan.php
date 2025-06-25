<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'karyawans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_karyawan',
        'alamat',
        'no_hp',
        'jabatan',
        'id_user',
    ];

    /**
     * Get the user associated with the karyawan.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
