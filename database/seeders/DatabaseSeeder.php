<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Item::create([
            'title' => 'Mango',
            'order' => 1,
            'status' => 1,
        ]);
        \App\Models\Item::create([
            'title' => 'Watemelon',
            'order' => 2,
            'status' => 1,
        ]);
        \App\Models\Item::create([
            'title' => 'Lion',
            'order' => 3,
            'status' => 1,
        ]);
        \App\Models\Item::create([
            'title' => 'Banana',
            'order' => 5,
            'status' => 1,
        ]);
        \App\Models\Item::create([
            'title' => 'Dragon',
            'order' => 6,
            'status' => 1,
        ]);
    }
}
