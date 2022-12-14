<?php

namespace ScoreBoard\User\Infrastructure\Persistence\InMemory;

use Exception;
use ScoreBoard\User\Domain\User;
use ScoreBoard\User\Domain\UserCollection;
use ScoreBoard\User\Domain\UserRepository;

class InMemoryUserRepository implements UserRepository
{

    private UserCollection $data;

    /**
     * @throws Exception
     */
    public function __construct(UserCollection $data)
    {
        $this->data = $data;
    }

    public function findUser(string $id): User|null
    {
        foreach ($this->data->getUsers() as $user) {
            if ($user->getId() == $id) {
                return $user;
            }
        }

        return null;
    }
}
