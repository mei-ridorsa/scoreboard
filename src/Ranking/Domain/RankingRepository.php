<?php

namespace ScoreBoard\Ranking\Domain;

use ScoreBoard\Position\Domain\PositionCollection;

interface RankingRepository
{
    public function findTop(int $topNumber): PositionCollection;

    public function findRelativePosition(int $position, int $width): PositionCollection;
}
