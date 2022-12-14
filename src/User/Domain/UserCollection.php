<?php

namespace App\User\Domain;

class UserCollection
{
    private array $users;

    public function __construct(array $users = [])
    {
        /** @var  User $user */
        foreach ($users as $user) {
            $this->users[] = $user;
        }
    }

    public static function fromSlice(UserCollection $original, int $offset, int $topNumber): UserCollection
    {
        return new self(array_slice($original->getUsers(), $offset, $topNumber));
    }

    public function getUsers(): array
    {
        return $this->users;
    }

    public function sort():void
    {
        usort($this->users, function ($user1, $user2) {
            /**
             * @var User $user1
             * @var User $user2
             */
            return $user2->getScore() <=> $user1->getScore();
        });
    }

    public function count():int
    {
        return count($this->users);
    }
}
