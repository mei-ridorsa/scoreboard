<?php

namespace ScoreBoard\Position\Domain;

use JetBrains\PhpStorm\Pure;
use ScoreBoard\User\Domain\User;

class Position
{
    private int $number;

    private User $user;

    public function __construct(int $number, User $user)
    {
        $this->number = $number;
        $this->user = $user;
    }

    #[Pure]
    public static function fromUserAndNumber(User $user, int $number): Position
    {
        return new self($number, $user);
    }

    public function getNumber(): int
    {
        return $this->number;
    }
}
