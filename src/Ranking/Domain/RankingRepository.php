<?php

namespace ScoreBoard\Ranking\Domain;

use ScoreBoard\User\Domain\UserCollection;

interface RankingRepository
{
    public function findTop(int $topNumber): UserCollection;

    public function findRelativePosition(int $position, int $width): UserCollection;
}
