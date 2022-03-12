<?php

declare(strict_types=1);

namespace Blog\User\Command;

use Pandawa\Component\Message\AbstractCommand;
use Pandawa\Component\Message\NameableMessageInterface;
use Pandawa\Component\Support\NameableClassTrait;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
class CreateUser extends AbstractCommand implements NameableMessageInterface
{
    use NameableClassTrait;

    protected string $username;
    protected string $email;
    protected string $name;
    protected string $password;
    protected string $role;

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRole(): string
    {
        return $this->role;
    }
}