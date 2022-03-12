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
    private UserCreator $creator;

    public function __construct(UserCreator $creator)
    {
        $this->creator = $creator;
    }

    public function handle(CreateUser $createUser): User
    {
        return $this->creator->create($createUser);
    }
}