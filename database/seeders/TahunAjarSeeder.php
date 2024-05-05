<?php

namespace Database\Seeders;

use App\Models\TahunAjar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunAjarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Datas = [
            [
                'namaKepsek' => 'Hartono Siregar',
                'noHpKepsep' => '+628135465254',
                'jmlGuruHonor' => 15,
                'jmlGuruPNS' => 9,
                'jmlRombel' => 14,
                'jmlMurid' => 5,
                'id_sekolah' => 2,
            ],
            
        ];

        foreach ($Datas as $key => $val) {
            TahunAjar::create($val);
        }
    }
}