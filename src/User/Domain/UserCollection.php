<?php

namespace ScoreBoard\User\Domain;

class UserCollection
{
    private array $users;

    public function __construct(array $users)
    {
        /** @var  User $user */
        foreach ($users as $user) {
            $this->users[] = $user;
        }
    }

    public function getUsers(): array
    {
        return $this->users;
    }
}
