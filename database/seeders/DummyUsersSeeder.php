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
                'nip' => '1',
                'name' => 'pai',
                'email' => 'pai@gmail.com',
                'phone' => '+62814568974123',
                'role' => 'admin',
                'pfp' => 'image/default_profile.png',
                'password' => bcrypt('pai123')
            ],
            [
                'nip' => '2',
                'name' => 'arrijal',
                'email' => 'arrijal@gmail.com',
                'phone' => '+62814568574123',
                'role' => 'staff',
                'pfp' => 'image/default_profile.png',
                'password' => bcrypt('arrijal123')
            ]
        ];

        foreach ($usersData as $key => $val) {
            User::create($val);
        }
    }
}