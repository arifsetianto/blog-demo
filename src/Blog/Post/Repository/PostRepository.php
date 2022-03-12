<?php

declare(strict_types=1);

namespace Blog\Post\Repository;

use Pandawa\Component\Ddd\Repository\Repository;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
class PostRepository extends Repository
{
    public function findPublish()
    {
        $qb = $this->createQueryBuilder();

        $qb->where('publish', true);

        return $this->execute($qb);
    }
}