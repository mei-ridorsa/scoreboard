<?php

namespace ScoreBoard\User\Infrastructure\Persistence\InMemory;

use Exception;
use ScoreBoard\User\Domain\User;
use ScoreBoard\User\Domain\UserCollection;
use ScoreBoard\User\Domain\UserRepository;

class InMemoryUserRepository implements UserRepository
{

    private UserCollection $data;

    private array $users = [
        ['id' => 1, 'score' => 0],
        ['id' => 2, 'score' => 100],
        ['id' => 3, 'score' => 54],
        ['id' => 4, 'score' => 95],
        ['id' => 5, 'score' => 7],
        ['id' => 6, 'score' => 9999],
        ['id' => 7, 'score' => 34234],
        ['id' => 8, 'score' => 99],
        ['id' => 9, 'score' => 4534],
        ['id' => 10, 'score' => 56756],
        ['id' => 11, 'score' => 345],
        ['id' => 12, 'score' => 56756],
        ['id' => 13, 'score' => 234],
        ['id' => 14, 'score' => 7686],
        ['id' => 15, 'score' => 6788]
    ];

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $userObjects = [];
        foreach ($this->users as $user) {
            $userObjects[] = User::fromArray($user);
        }

        $this->data = new UserCollection($userObjects);
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
