<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Recipe;


class Ingredient extends Model
{
    use HasFactory;

    public function recipes(): BelongsToMany {

        return $this->hasMany(Recipe::class)
            ->withPivot(['amount', 'unit']);
    }
}
