<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class testsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ここに登録したいレコードを書く
        // まずはテーブルのクリア
        DB::table('tests')->truncate();

        // 初期データを用意する(キー->内容の連想配列)
        $tests = [
            [
                'id' => '1',
                'confirmed' => '1',
                // 'author' => 'saki'
            ],
            [
                'id' => '2',
                'confirmed' => '2',
                // 'author' => 'satoshi'
            ],
            [
                'id' => '3',
                'confirmed' => '1',
                // 'author' => 'shiho'
            ]
        ];
        // 登録
        foreach ($tests as $test) {
            \App\Models\Test::create($test);
        }
    }
}
