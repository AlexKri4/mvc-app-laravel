<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entri>
 */
class EntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => fake()->numberBetween(1, Category::all()->count()),
            'name' => fake()->text(50),
            'comment' => fake()->text(100),
            'amount' => fake()->numberBetween(10, 100)
        ];
    }
}
