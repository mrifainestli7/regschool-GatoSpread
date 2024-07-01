<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rekap extends Model
{
    use HasFactory;
    protected $table = 'rekap';
    protected $primaryKey = 'id_rekap';
    public $incrementing = false;
    protected $keyType = 'bigInteger';
    protected $fillable = [
        'akreditasi',
        'namaKepsek',
        'noHpKepsek',
        'jmlGuruHonor',
        'jmlGuruPNS',
        'jmlRombel',
        'jmlMuridPria',
        'jmlMuridWanita',
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