<?php

namespace Database\Seeders;

use App\Models\Rekap as ModelsRekap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Rekap extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Datas = [
            [
                'akreditasi' => 'A',
                'namaKepsek' => 'Ahmad Fauzi',
                'noHpKepsek' => '081234567890',
                'jmlGuruHonor' => 10,
                'jmlGuruPNS' => 20,
                'jmlRombel' => 15,
                'jmlMuridPria' => 200,
                'jmlMuridWanita' => 180,
                'id_sekolah' => 1,
                'id_thnAjar' => 1,
            ],
            [
                'akreditasi' => 'B',
                'namaKepsek' => 'Budi Santoso',
                'noHpKepsek' => '081234567891',
                'jmlGuruHonor' => 12,
                'jmlGuruPNS' => 18,
                'jmlRombel' => 12,
                'jmlMuridPria' => 150,
                'jmlMuridWanita' => 160,
                'id_sekolah' => 1,
                'id_thnAjar' => 2,
            ],
        ];
        foreach ($Datas as $key => $val) {
            ModelsRekap::create($val);
        }
    }
}