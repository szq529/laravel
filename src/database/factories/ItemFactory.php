<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        //item
        // $id'->increments('id'),
        $category = ['funde', 'rip', 'mascara', 'eyebrow'];
        $color = ['red', 'green', 'blue', 'black'];
        $parts = ['face', 'eye', 'hand'];
        // $purchase = implode([]);
        // $update_at = false;
        // $created_at = [];

        $category = $category[rand(0, count($category) - 1)];
        $color = $color[rand(0, count($color) - 1)];
        $parts = $parts[rand(0, count($parts) - 1)];
        return [
            'category' => $category,
            'color' => $color,
            'parts' => $parts,
            'purchase_date' => now(),
        ];
    }
}
