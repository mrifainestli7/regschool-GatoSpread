<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TahunAjar extends Model
{
    use HasFactory;
    protected $table = 'tahun_ajar';
    protected $primaryKey = 'id_thnAjar';
    public $incrementing = false;
    protected $keyType = 'bigInteger';
    protected $fillable = [
        'tahunAjar1',
        'tahunAjar2',
    ];
}