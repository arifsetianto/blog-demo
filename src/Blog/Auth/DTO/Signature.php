<?php

declare(strict_types=1);

namespace Blog\Auth\DTO;

use Illuminate\Contracts\Support\Arrayable;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
final class Signature implements Arrayable
{
    private string $token;
    private string $type;
    private array $attributes;

    public function __construct(string $token, string $type, array $attributes)
    {
        $this->token = $token;
        $this->type = $type;
        $this->attributes = $attributes;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function toArray(): array
    {
        return array_merge(
            $this->attributes,
            [
                'token' => $this->token,
                'type'  => $this->type,
            ]
        );
    }
}