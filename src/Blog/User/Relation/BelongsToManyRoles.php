<?php

declare(strict_types=1);

namespace Blog\User\Relation;

use Illuminate\Support\Collection;
use Pandawa\Component\Ddd\Relationship\BelongsToMany;
use Pandawa\Component\Ddd\RelationshipBehaviorTrait;
use Blog\User\Model\Role;

/**
 * @property-read Role[]|Collection $roles
 *
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
trait BelongsToManyRoles
{
    use RelationshipBehaviorTrait;

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}