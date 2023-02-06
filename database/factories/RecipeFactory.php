<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // On crée un faut titre avec entre 4 et 12 mots (on précise true pour renvoyer une string)
            'title' => $this->faker->words(rand(4, 12), true)
        ];
    }
}
