<?php

declare(strict_types=1);

namespace Blog\User\Repository;

use Pandawa\Component\Ddd\Collection;
use Pandawa\Component\Ddd\Repository\Repository;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
class RoleRepository extends Repository
{
    public function findAllByNames(array $names): Collection
    {
        $qb = $this->createQueryBuilder();

        $qb->whereIn('name', $names);

        return $this->execute($qb);
    }
}