<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $category = ['funde', 'rip', 'mascara', 'eyebrow'];
        // $color = ['red', 'green', 'blue', 'black'];
        // $parts = ['face', 'eye', 'hand'];
        //  ---------------------------------------
        // $category = $category[rand(0, count($category) - 1)];
        // $color = $color[rand(0, count($color) - 1)];
        // $parts = $parts[rand(0, count($parts) - 1)];
        //  ---------------------------------------
        return [
            // 'カラム名' => 設定したい値,
            'category' => $this->faker->text,
            'color' => $this->faker->safecolorName,
            'parts' => $this->faker->text,
            'purchase_date' => now(),
        ];
    }
}
