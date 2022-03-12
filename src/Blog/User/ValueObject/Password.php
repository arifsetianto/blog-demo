<?php

declare(strict_types=1);

namespace Blog\User\ValueObject;

use Illuminate\Contracts\Database\Eloquent\Castable;
use Pandawa\Component\Serializer\SerializableInterface;
use Blog\User\Cast\PasswordCast;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
class Password implements Castable, SerializableInterface
{
    const DEFAULT_COST = 11;

    public function __construct(private array $options, private array $algo, private string $hashed)
    {
        if (!$this->isHashed($hashed)) {
            throw new \InvalidArgumentException('Password are not hashed or invalid hashed', 422);
        }
    }

    public static function castUsing(array $arguments): string
    {
        return PasswordCast::class;
    }

    public static function create(string $password, int $cost = self::DEFAULT_COST): Password
    {
        $options = ['cost' => $cost];
        $algo = ['code' => PASSWORD_BCRYPT, 'name' => 'bcrypt'];

        return new self($options, $algo, self::hash($password, $algo['code'], $options));
    }

    public function serialize(): string
    {
        return json_encode(
            [
                'options' => $this->options,
                'algo'    => $this->algo,
                'hashed'  => $this->hashed,
            ]
        );
    }

    public function matches(string $password): bool
    {
        return password_verify($password, $this->hashed);
    }

    public function isNeedToRehash(): bool
    {
        return password_needs_rehash($this->hashed, $this->algo['code'], $this->options);
    }

    public function isHashed(string $password): bool
    {
        $expected = [
            'algo'     => $this->algo['code'],
            'algoName' => $this->algo['name'],
            'options'  => [
                'cost' => $this->options['cost'],
            ],
        ];

        return $expected === password_get_info($password);
    }

    private static function hash(string $password, $algo, array $options): string
    {
        return password_hash($password, $algo, $options);
    }
}