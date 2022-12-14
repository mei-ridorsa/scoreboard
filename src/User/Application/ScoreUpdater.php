<?php

namespace App\User\Application;

use App\User\Domain\Exception\UserNotFoundException;
use App\User\Domain\User;
use App\User\Domain\UserRepository;

class ScoreUpdater
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @throws UserNotFoundException
     */
    public function setScore(string $userId, int $total): User
    {
        $user = $this->userRepository->findUser($userId);

        if (!is_null($user)) {
            $user->setScore($total);

            return $user;
        }
        throw UserNotFoundException::fromUserId($userId);
    }

    /**
     * @throws UserNotFoundException
     */
    public function addScore(string $userId, int $score): User
    {
        $user = $this->userRepository->findUser($userId);

        if (!is_null($user)) {
            $user->addScore($score);
            return $user;
        }
        throw UserNotFoundException::fromUserId($userId);
    }
}
