<?php

namespace ScoreBoard\Ranking\Application\RankingUpdater;

use ScoreBoard\Position\Domain\PositionCollection;
use ScoreBoard\Ranking\Domain\RankingRepository;

class RankingUpdater
{
    private RankingRepository $rankingRepository;

    public function __construct(RankingRepository $rankingRepository)
    {
        $this->rankingRepository = $rankingRepository;
    }

    public function findTop(int $topNumber): PositionCollection
    {
        return $this->rankingRepository->findTop($topNumber);
    }

    public function findRelativePosition(int $position, int $width): PositionCollection
    {
        return $this->rankingRepository->findRelativePosition($position, $width);
    }
}
