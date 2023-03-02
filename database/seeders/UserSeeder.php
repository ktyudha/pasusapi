<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@api.id',
            'password' => bcrypt('admin'),
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@api.id',
            'password' => bcrypt('user'),
        ]);
    }
}
