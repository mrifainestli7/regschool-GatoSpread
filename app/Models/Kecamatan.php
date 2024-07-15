<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatan';
    protected $primaryKey = 'id_kecamatan';
    public $incrementing = false;
    protected $keyType = 'bigInteger';

    protected $fillable = [
        'id_kecamatan',
        'nama_kecamatan'
    ];

    public function sekolah(): HasMany {
        return $this->hasMany(Sekolah::class, 'id_kecamatan', 'id_kecamatan');
    }

    public function jumlahNegeri() {
        return $this->sekolah()->where('status', 'negeri')->count();
    }

    public function jumlahSwasta(){
        return $this->sekolah()->where('status', 'swasta')->count();
    }

    public function jumlahSekolah() {
        return $this->sekolah()->count();
    }
}