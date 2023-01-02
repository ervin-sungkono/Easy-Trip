<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Item;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create([
            'email' => 'admin@example.com',
            'role' => 'admin'
        ]);

        User::factory(1)->create([
            'email' => 'member@example.com',
        ]);

        Item::factory(100)->create();
    }
}
