<?php

namespace App\User\Domain;

use JetBrains\PhpStorm\Pure;

class User
{
    private string $id;

    private int $score;

    public function __construct(string $id, int $score = 0)
    {
        $this->id = $id;
        $this->score = $score;
    }

    #[Pure]
    public static function fromArray(array $data): User
    {
        return new self(
            $data['id'],
            $data['score']
        );
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function setScore(int $score): void
    {
        $this->score = $score;
    }

    public function addScore(int $score): void
    {
        $this->score += $score;
    }
}
