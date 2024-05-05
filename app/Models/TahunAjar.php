<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TahunAjar extends Model
{
    use HasFactory;
    protected $table = 'tahunajar';
    protected $primaryKey = 'id_thnAjar';
    public $incrementing = false;
    protected $keyType = 'bigInteger';
    protected $fillable = [
        'namaKepsek',
        'noHpKepsep',
        'jmlGuruHonor',
        'jmlGuruPNS',
        'jmlRombel',
        'jmlMurid',
        'id_sekolah'
    ];
    public function sekolah(): BelongsTo
    {
        return $this->belongsTo(Sekolah::class, 'id_sekolah', 'id_sekolah');
    }
}