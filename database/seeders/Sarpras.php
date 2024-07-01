<?php

namespace Database\Seeders;

use App\Models\Sarpras as ModelsSarpras;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Sarpras extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'jmlh_rk' => 10,
                'jmlh_perpus' => 2,
                'jmlh_rguru' => 1,
                'jmlh_ruks' => 5,
                'jmlh_toilet' => 4,
                'jmlh_kantin' => 1,
                'pagar' => 'Terpenuhi',
                'gerbang' => 'Belum Terpenuhi',
                'paving' => 'Terpenuhi',
                'id_sekolah' => 1,
                'id_thnAjar' => 3,
            ],
            [
                'jmlh_rk' => 15,
                'jmlh_perpus' => 1,
                'jmlh_rguru' => 2,
                'jmlh_ruks' => 6,
                'jmlh_toilet' => 3,
                'jmlh_kantin' => 2,
                'pagar' => 'Terpenuhi',
                'gerbang' => 'Belum Terpenuhi',
                'paving' => 'Terpenuhi',
                'id_sekolah' => 2,
                'id_thnAjar' => 2,
            ],
    
        ];

        foreach ($data as $datum) {
            ModelsSarpras::create($datum);
        }
    }
}