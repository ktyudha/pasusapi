<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'PASUS ICON SMKN 1 PUNGGING',
            'slug' => 'pasus-icon-smkn-1-pungging',
            'body' => 'pasus merupakan icon smkn1punging sejak dahulu',
            'summary' => 'pasus merupakan icon smkn1punging sejak dahulu',
            'status' => 'draft',
            'thumbnail' => 'storage/images/event/pasusicon.jpg',
        ]);
    }
}
