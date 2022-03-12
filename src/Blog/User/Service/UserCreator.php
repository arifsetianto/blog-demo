<?php

declare(strict_types=1);

namespace Blog\User\Service;

use Pandawa\Component\Ddd\Collection;
use Blog\User\Command\CreateUser;
use Blog\User\Model\User;
use Blog\User\Repository\RoleRepository;
use Blog\User\Repository\UserRepository;
use Blog\User\ValueObject\Password;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
final class UserCreator
{
    private UserRepository $repository;
    private RoleRepository $roleRepository;

    public function __construct(UserRepository $repository, RoleRepository $roleRepository)
    {
        $this->repository = $repository;
        $this->roleRepository = $roleRepository;
    }

    public function create(CreateUser $createUser): User
    {
        $user = new User($createUser->origin()->exclude(['password'])->all());
        $user->password = Password::create($createUser->getPassword());

        $user->roles()->attach($this->getAdminRoles($createUser->getRole()));

        return $this->repository->save($user);
    }

    private function getAdminRoles(string $role): Collection
    {
        return $this->roleRepository->findAllByNames([$role]);
    }
}