<?php

namespace Database\Seeders;

use App\Models\Human;
use Database\Factories\ItemFactory;
use Database\Factories\HumanFactory;
use Illuminate\Database\Seeder;
use App\Models\Item;

// use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 作成したSeederを読み込む指定
        // \App\Models\User::factory(10)->create();
        // Item::factory()->count(5)->create();
        Human::factory()->count(5)->create();
        $this->call(HumanTableSeeder::class);
    }
}
