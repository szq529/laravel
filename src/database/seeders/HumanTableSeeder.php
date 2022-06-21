<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Human;

class HumanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Human::factory()->count(5)->create();
        // $this->call(HumanTableSeeder::class);
        // DB::table('human')->insert([
        //     'id' => '4',
        //     'name' => 'さき',
        //     'mail' => 'ddfsdf' . '@gmail.com',
        //     'age' => '23',
        //     // 'timestamps' => new DateTime,
        // ]);
    }
}
