<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'admin', 'email' => 'admin@yopmail.com', 'password' => Hash::make('password')],
            ['name' => 'user', 'email' => 'user@yopmail.com', 'password' => Hash::make('password')],
        ];

        foreach ($users as $user) {
            $existingUser = User::where('email', $user['email'])->first();

            if (!$existingUser) {
                User::create($user);
            }
        }
    }
}
