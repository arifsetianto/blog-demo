<?php

declare(strict_types=1);

namespace Blog\User\Relation;

use Pandawa\Component\Ddd\Relationship\BelongsTo;
use Pandawa\Component\Ddd\RelationshipBehaviorTrait;
use Blog\User\Model\User;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
trait BelongsToUser
{
    use RelationshipBehaviorTrait;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}