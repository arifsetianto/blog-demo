<?php

declare(strict_types=1);

namespace Blog\Auth\Command;

use Blog\Auth\DTO\Signature;
use Illuminate\Auth\AuthenticationException;
use Pandawa\Module\Api\Security\Authentication\AuthenticationManager;
use Blog\User\Repository\UserRepository;

/**
 * @author  Arif Setianto <arifsetiantoo@gmail.com>
 */
final class AuthenticateHandler
{
    private UserRepository $repository;
    private AuthenticationManager $authenticationManager;

    public function __construct(UserRepository $repository, AuthenticationManager $authenticationManager)
    {
        $this->repository = $repository;
        $this->authenticationManager = $authenticationManager;
    }

    public function handle(Authenticate $authenticate): Signature
    {
        if (null === $user = $this->repository->findByCredential($authenticate->getUsername())) {
            throw new AuthenticationException(__('The given username or password is invalid'));
        }

        if (!$user->password || !$user->password->matches($authenticate->getPassword())) {
            throw new AuthenticationException(__('The given username or password is invalid'));
        }

        $signature = $this->authenticationManager->sign('jwt', $user);

        return new Signature($signature->getCredentials(), 'Bearer', $signature->getAttributes());
    }
}