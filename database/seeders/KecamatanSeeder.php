<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Data = [
            [
                'nama_kecamatan' => 'Sunggal',
            ],
            [
                'nama_kecamatan' => 'Sibolangit',
            ],
            [
                'nama_kecamatan' => 'Pancur Batu',
            ],
            [
                'nama_kecamatan' => 'Kutalimbaru',
            ],
            [
                'nama_kecamatan' => 'Hamparan Perak',
            ],
            [
                'nama_kecamatan' => 'Labuhan Deli',
            ],
            [
                'nama_kecamatan' => 'Percut Sei Tuan',
            ],
            [
                'nama_kecamatan' => 'Batang Kuis',
            ],
            [
                'nama_kecamatan' => 'Pantai labu',
            ],
        ];

        foreach ($Data as $key => $val) {
            Kecamatan::create($val);
        }
    }
}