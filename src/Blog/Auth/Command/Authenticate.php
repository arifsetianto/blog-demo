<?php

declare(strict_types=1);

namespace Blog\Auth\Command;

use Pandawa\Component\Message\AbstractCommand;
use Pandawa\Component\Message\NameableMessageInterface;
use Pandawa\Component\Support\NameableClassTrait;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
class Authenticate extends AbstractCommand implements NameableMessageInterface
{
    use NameableClassTrait;

    protected string $username;
    protected string $password;

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}