<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\RecipeFactory;
use Database\Factories\IngredientFactory;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Relations\HasAttached;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->has(
            Recipe::factory(3)->hasAttached(
                Ingredient::factory(5),
                [
                    'amount' => 10,
                    'unit' => 'cl'
                ]
            )
        )->create();
    }
}
