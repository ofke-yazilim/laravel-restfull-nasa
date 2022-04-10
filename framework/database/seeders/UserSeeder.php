<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'     => 'Ömer Kesmez',
                'email'    => 'info@okesmez.com',
                'password' => Hash::make('123456'),
                'role'     => 2,
            ],
            [
                'name' => 'Sanctum User 1',
                'email' => 'sanctum@laravel.com',
                'password' => Hash::make('123456'),
                'role'     => 2,
            ],
            [
                'name' => 'Sanctum User 2',
                'email' => 'sanctum2@laravel.com',
                'password' => Hash::make('123456'),
                'role'     => 2,
            ],
        ];

        foreach ($users as $user) {
            User::insert($user);
        }
    }
}
