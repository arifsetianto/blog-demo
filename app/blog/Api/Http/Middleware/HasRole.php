<?php

declare(strict_types=1);

namespace Blog\Api\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use User\Model\User;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
final class HasRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        /** @var User $user */
        if (null !== $user = $request->user()) {
            if ($user->hasAnyRoles($roles)) {
                return $next($request);
            }
        }

        throw new AuthorizationException(__('You are not authorized to perform this action'));
    }
}