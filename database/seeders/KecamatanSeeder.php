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
            ['nama_kecamatan' => 'Bangun Purba'],
            ['nama_kecamatan' => 'Batang Kuis'],
            ['nama_kecamatan' => 'Beringin'],
            ['nama_kecamatan' => 'Biru-biru'],
            ['nama_kecamatan' => 'Delitua'],
            ['nama_kecamatan' => 'Gunung Meriah'],
            ['nama_kecamatan' => 'Galang'],
            ['nama_kecamatan' => 'Hamparan Perak'],
            ['nama_kecamatan' => 'Kutalimbaru'],
            ['nama_kecamatan' => 'Labuhan Deli'],
            ['nama_kecamatan' => 'Lubuk Pakam'],
            ['nama_kecamatan' => 'Namorambe'],
            ['nama_kecamatan' => 'Pagar Merbau'],
            ['nama_kecamatan' => 'Pancur Batu'],
            ['nama_kecamatan' => 'Pantai Labu'],
            ['nama_kecamatan' => 'Patumbak'],
            ['nama_kecamatan' => 'Percut Sei Tuan'],
            ['nama_kecamatan' => 'Sibolangit'],
            ['nama_kecamatan' => 'STM Hilir'],
            ['nama_kecamatan' => 'STM Hulu'],
            ['nama_kecamatan' => 'Sunggal'],
            ['nama_kecamatan' => 'Tanjung Morawa']
        ];

        foreach ($Data as $key => $val) {
            Kecamatan::create($val);
        }
    }
}