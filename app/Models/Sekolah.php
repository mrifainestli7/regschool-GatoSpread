<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sekolah extends Model
{
    use HasFactory;
    protected $table = 'sekolah';
    protected $primaryKey = 'id_sekolah';
    public $incrementing = false;
    protected $keyType = 'bigInteger';
    protected $fillable = [
        'nama_sekolah',
        'npsn',
        'deskripsi',
        'status',
        'alamat',
        'rt',
        'rw',
        'kelurahan_desa',
        'id_kecamatan',
        'kode_pos',
    ];

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id_kecamatan');
    }
    public function sarpras()
    {
        return $this->hasOne(Sarpras::class, 'id_sekolah', 'id_sekolah');
    }

    public function rekap()
    {
        return $this->hasOne(Rekap::class, 'id_sekolah', 'id_sekolah');
    }
}