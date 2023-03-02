<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'DIKLAT'
        ]);
        Category::create([
            'name' => 'LKBB'
        ]);
        Category::create([
            'name' => 'DAYUNG'
        ]);
        Category::create([
            'name' => 'RENANG'
        ]);
        Category::create([
            'name' => 'KUMPUL'
        ]);
        Category::create([
            'name' => 'LARI PAGI'
        ]);
    }
}
