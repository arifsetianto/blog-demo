<?php

declare(strict_types=1);

namespace Blog\User\Query;

use Blog\User\Repository\UserRepository;
use Pandawa\Component\Ddd\Repository\Repository;
use Pandawa\Component\Message\AbstractQuery;
use Pandawa\Component\Message\InteractsWithRepositoryTrait;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
final class FindActiveUsersHandler
{
    use InteractsWithRepositoryTrait;

    public function __construct(private UserRepository $repository)
    {
    }

    /**
     * @param UserRepository  $repository
     * @param FindActiveUsers $query
     *
     * @return mixed
     */
    protected function run($repository, $query)
    {
        return $repository->findByActive();
    }

    protected function repository(): UserRepository
    {
        return $this->repository;
    }
}