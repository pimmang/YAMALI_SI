<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'sr',
            'email' => 'sr@gmail.com',
            // 'avatar' => 'images/dummyavatar.png',
            'password' => bcrypt('123456789')
        ]);

        User::create([
            'name' => 'makassar',
            'email' => 'makassar@gmail.com',
            // 'avatar' => 'images/dummyavatar.png',
            'password' => bcrypt('123456789')
        ]);
        User::create([
            'name' => 'gowa',
            'email' => 'gowa@gmail.com',
            // 'avatar' => 'images/dummyavatar.png',
            'password' => bcrypt('123456789')
        ]);
        User::create([
            'name' => 'pinrang',
            'email' => 'pinrang@gmail.com',
            // 'avatar' => 'images/dummyavatar.png',
            'password' => bcrypt('123456789')
        ]);
        User::create([
            'name' => 'bulukumba',
            'email' => 'bulukumba@gmail.com',
            // 'avatar' => 'images/dummyavatar.png',
            'password' => bcrypt('123456789')
        ]);
    }
}
