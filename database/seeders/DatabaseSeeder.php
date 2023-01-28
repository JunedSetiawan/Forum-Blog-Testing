<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Forum;
use App\Models\KategoryForum;
use App\Models\SubKategory;
use Database\Factories\ForumFactory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('password')
        ]);
        SubKategory::create([
            'name' => "web programming",
            'kategory_id' => 1
        ]);
        SubKategory::create([
            'name' => "web development",
            'kategory_id' => 1
        ]);
        SubKategory::create([
            'name' => "lifestyle",
            'kategory_id' => 2
        ]);

        KategoryForum::create([
            'name' => 'technology',
            'sub_kategory_id' => 1,
        ]);
        KategoryForum::create([
            'name' => 'healty',
            'sub_kategory_id' => 3,
        ]);

        // Forum::factory(10)->create();

        // for ($i = 1; $i <= 5; $i++) {
        //     Forum::create([
        //         'title' => fake()->sentence(),
        //         'body' => fake()->paragraph(2),
        //         'user_id' => "3",
        //         'kategory_forum_id' => fake()->shuffle([1, 2])
        //     ]);
        // }

        // Forum::create([
        //     'title' => 'forum 2',
        //     'body' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam cumque sit consequatur accusantium molestias quam quisquam. Consequuntur, quas vitae animi necessitatibus quibusdam corporis recusandae itaque voluptates eius dolorum exercitationem ut laboriosam? Magni dolorem itaque quod aut fuga expedita, et in.",
        //     'user_id' => "3",
        //     'kategory_forum_id' => "1"
        // ]);
    }
}
