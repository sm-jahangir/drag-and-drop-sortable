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

        // Tag Seeder
        \App\Models\Tag::create([
            'title' => 'Item 1',
            'order' => 1,
            'parent_id' => 0,
        ]);
        // Tag Seeder
        \App\Models\Tag::create([
            'title' => 'Item 2',
            'order' => 2,
            'parent_id' => 0,
        ]);
        // Tag Seeder
        \App\Models\Tag::create([
            'title' => 'Item 3',
            'order' => 3,
            'parent_id' => 1,
        ]);
        // Tag Seeder
        \App\Models\Tag::create([
            'title' => 'Item 4',
            'order' => 4,
            'parent_id' => 1,
        ]);
        // Tag Seeder
        \App\Models\Tag::create([
            'title' => 'Item 5',
            'order' => 5,
            'parent_id' => 2,
        ]);
        // Tag Seeder
        \App\Models\Tag::create([
            'title' => 'Item 6',
            'order' => 6,
            'parent_id' => 5,
        ]);
        // Tag Seeder
        \App\Models\Tag::create([
            'title' => 'Item 7',
            'order' => 7,
            'parent_id' => 0,
        ]);
        // Tag Seeder
        \App\Models\Tag::create([
            'title' => 'Item 8',
            'order' => 8,
            'parent_id' => 0,
        ]);
        // Tag Seeder
        \App\Models\Tag::create([
            'title' => 'Item 9',
            'order' => 9,
            'parent_id' => 0,
        ]);
        // Tag Seeder
        \App\Models\Tag::create([
            'title' => 'Item 10',
            'order' => 10,
            'parent_id' => 0,
        ]);
    }
}
