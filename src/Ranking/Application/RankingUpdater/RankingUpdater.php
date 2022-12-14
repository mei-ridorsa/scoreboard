<?php

namespace ScoreBoard\Ranking\Application\RankingUpdater;

use ScoreBoard\Ranking\Domain\RankingRepository;
use ScoreBoard\User\Domain\UserCollection;

class RankingUpdater
{
    private RankingRepository $rankingRepository;

    public function __construct(RankingRepository $rankingRepository)
    {
        $this->rankingRepository = $rankingRepository;
    }

    public function findTop(int $topNumber): UserCollection
    {
        return $this->rankingRepository->findTop($topNumber);
    }

    public function findRelativePosition(int $position, int $width): UserCollection
    {
        return $this->rankingRepository->findRelativePosition($position, $width);
    }
}
