<?php

namespace App\Ranking\Domain;

use App\User\Domain\UserCollection;

interface RankingRepository
{
    public function findTop(int $topNumber): UserCollection;

    public function findRelativePosition(int $position, int $width): UserCollection;
}
