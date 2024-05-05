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
        'alamat_sekolah',
        'deskripsi_sekolah',
        'id_kecamatan'
    ];

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id_kecamatan');
    }
}