<?php

declare(strict_types=1);

namespace Blog\User\Command;

use Blog\User\Model\User;
use Blog\User\Service\UserCreator;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
final class CreateUserHandler
{
    public function __construct(private UserCreator $creator)
    {
    }

    public function handle(CreateUser $createUser): User
    {
        return $this->creator->create($createUser);
    }
}