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
                'npsn' => '12345678',
                'deskripsi' => 'Sekolah dasar negeri di Pantai Labu',
                'status' => 'Negeri',
                'id_kecamatan' => 9,
                'alamat' => 'Jl. Pantai Labu No.1',
                'rt' => '01',
                'rw' => '02',
                'kelurahan_desa' => 'Pantai Labu',
                'kode_pos' => '20353',
            ]
        ];

        foreach ($Datas as $key => $val) {
            Sekolah::create($val);
        }
    }
}