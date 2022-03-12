<?php

declare(strict_types=1);

namespace Blog\User\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;
use Pandawa\Component\Ddd\AbstractModel;
use Pandawa\Module\Api\Security\Contract\SignableUserInterface;
use Blog\User\Relation\BelongsToManyRoles;
use Blog\User\ValueObject\Password;

/**
 * @property Password $password
 *
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
class User extends AbstractModel implements AuthenticatableContract, SignableUserInterface
{
    use Notifiable, Authenticatable, BelongsToManyRoles;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];

    protected $casts = [
        'password' => Password::class,
    ];

    public function hasRole(string $role): bool
    {
        return $this->roles->contains('name', $role);
    }

    public function hasAnyRoles(array $roles): bool
    {
        foreach ($roles as $role) {
            if (true === $this->hasRole($role)) {
                return true;
            }
        }

        return false;
    }

    public function getSignPayload(): array
    {
        return [
            'sub'      => $this->id,
            'username' => $this->username,
        ];
    }
}