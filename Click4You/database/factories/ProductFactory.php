<?php

namespace Database\Factories;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    protected static $categorieIds;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categorie = static::$categorieIds ??= Categorie::query()
                                                        ->pluck('id')
                                                        ->toArray();
        
        return [
            'categorie_id' => fake()->randomElement($categorie),
            'names' => fake()->sentence(mt_rand(3,4)),
            'description' => fake()->text(200),
            'price' => fake()->randomFloat(2,10,999.99),
            'brand' => fake()->sentence(mt_rand(1,2)),
            'quantity' => fake()->numberBetween(1,100),
        ];
    }
}
