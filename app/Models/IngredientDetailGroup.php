<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IngredientDetailGroup extends Model
{
    use SoftDeletes;
    use SoftCascadeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'recipe_id',
        'name'
    ];

    /**
     * Relations that cascade or restrict on delete.
     *
     * @var array
     */
    protected $softCascade = [
        'ingredientDetails@restrict',
    ];

    /**
     * Get the ingredient-detail-group's recipe
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipe(): BelongsTo
    {
        return $this->belongsTo('\App\Models\Recipe');
    }

    /**
     * Get the ingredient-detail-group's ingredient-details
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function ingredientDetails(): HasMany
    {
        return $this->hasMany('\App\Models\IngredientDetail');
    }
}
