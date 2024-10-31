<?php

namespace App\Models\Article;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Trait RelationshipTrait
 *
 * Trait used to manage relationship between Article Model and other Models.
 */
trait RelationshipTrait
{
    /**
     * Return the User that has the Article.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
