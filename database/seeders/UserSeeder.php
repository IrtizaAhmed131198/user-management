<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456789'),
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'User',
            'email' => 'vuxaqa@mailinator.com',
            'password' => Hash::make('123456789'),
            'role_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            ].
        );
    }
}
