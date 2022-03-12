<?php

declare(strict_types=1);

namespace Blog\User\Cast;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Blog\User\ValueObject\Password;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
final class PasswordCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes): Password
    {
        $data = json_decode($value, true);

        return new Password($data['options'], $data['algo'], $data['hashed']);
    }

    public function set($model, string $key, $value, array $attributes): string
    {
        return $value instanceof Password ? $value->serialize() : $value;
    }
}