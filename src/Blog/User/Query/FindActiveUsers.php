<?php

declare(strict_types=1);

namespace Blog\User\Query;

use Pandawa\Component\Message\AbstractQuery;
use Pandawa\Component\Message\NameableMessageInterface;
use Pandawa\Component\Support\NameableClassTrait;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
class FindActiveUsers extends AbstractQuery implements NameableMessageInterface
{
    use NameableClassTrait;
}