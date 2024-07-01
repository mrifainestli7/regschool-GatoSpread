<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sarpras extends Model
{
    use HasFactory;
    protected $table = 'sarpras';
    protected $primaryKey = 'id_sarpras';
    public $incrementing = false;
    protected $keyType = 'bigInteger';
    protected $fillable = [
        'jmlh_rk',
        'jmlh_perpus',
        'jmlh_rguru',
        'jmlh_ruks',
        'jmlh_toilet',
        'jmlh_kantin',
        'pagar',
        'gerbang',
        'paving',
        'id_sekolah',
        'id_thnAjar',
    ];

    public function sekolah(): BelongsTo
    {
        return $this->belongsTo(Sekolah::class, 'id_sekolah', 'id_sekolah');
    }
    public function tahunAjar(): BelongsTo
    {
        return $this->belongsTo(TahunAjar::class, 'id_thnAjar', 'id_thnAjar');
    }
}