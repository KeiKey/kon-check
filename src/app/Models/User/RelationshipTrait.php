<?php

namespace App\Models\User;

use App\Models\Article\Article;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Trait RelationshipTrait
 *
 * Trait used to manage relationship between User Model and other Models.
 */
trait RelationshipTrait
{
    /**
     * Return the Articles that belong to the User.
     *
     * @return HasMany
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
