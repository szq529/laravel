<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HumanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('human')->insert([
            'id' => '4',
            'name' => 'さき',
            'mail' => 'ddfsdf' . '@gmail.com',
            'age' => '23',
            // 'timestamps' => new DateTime,
        ]);
    }
}
