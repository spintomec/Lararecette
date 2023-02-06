<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;
use App\Models\ingredient;


class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['title'];
    protected $guarded = [];

    public function user(): BelongsTo {
        
        // Une recette est rattachée à 1 seul utilisateur
        return $this->belongsTo(User::class);
    }

    public function ingredients(): BelongsToMany {

            return $this->belongsToMany(Ingredient::class)
            ->withPivot(['amount', 'unit']);
        }
}
