<?php

namespace Database\Seeders;

use App\Models\Sekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Datas = [
            [
                'nama_sekolah' => 'SDN 1 Pantai Labu',
                'alamat_sekolah' => 'pantai labu',
                'deskripsi_sekolah' => 'sekolah dasar negeri di pantai labu',
                'id_kecamatan' => 9,
            ],
            [
                'nama_sekolah' => 'SDN 1 sunggal',
                'alamat_sekolah' => 'sunggal',
                'deskripsi_sekolah' => 'sekolah dasar negeri di sunggal',
                'id_kecamatan' => 1,
            ]
        ];

        foreach ($Datas as $key => $val) {
            Sekolah::create($val);
        }
    }
}