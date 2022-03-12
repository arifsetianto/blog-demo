<?php

declare(strict_types=1);

namespace Blog\User\Repository;

use Pandawa\Component\Ddd\Repository\Repository;
use Blog\User\Model\User;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
class UserRepository extends Repository
{
    public function findByCredential(string $credential): ?User
    {
        $qb = $this->createQueryBuilder();

        $qb
            ->where('username', $credential)
            ->orWhere('email', $credential)
        ;

        return $this->executeSingle($qb);
    }
}