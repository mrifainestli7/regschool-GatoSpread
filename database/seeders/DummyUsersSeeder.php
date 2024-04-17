<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersData = [
            [
                'name' => 'pai',
                'email' => 'pai@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('pai123')
            ],
            [
                'name' => 'arrijal',
                'email' => 'arrijal@gmail.com',
                'role' => 'staff',
                'password' => bcrypt('arrijal123')
            ]
        ];

        foreach ($usersData as $key => $val) {
            User::create($val);
        }
    }
}