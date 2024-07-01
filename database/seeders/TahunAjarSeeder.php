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
                'tahunAjar1' => 2021,
                'tahunAjar2' => 2022,
            ],
            [
                'tahunAjar1' => 2022,
                'tahunAjar2' => 2023,
            ],
            [
                'tahunAjar1' => 2023,
                'tahunAjar2' => 2024,
            ],
        ];

        foreach ($Datas as $key => $val) {
            TahunAjar::create($val);
        }
    }
}