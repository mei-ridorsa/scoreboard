<?php

namespace ScoreBoard\Ranking\Application\RankingUpdater;

use PHPUnit\Framework\TestCase;
use ScoreBoard\Ranking\Domain\Exception\IncorrectParamsForRankingSearchException;
use ScoreBoard\Ranking\Infrastructure\Persistence\InMemory\InMemoryRankingRepository;

class RankingUpdaterTest extends TestCase
{
    private RankingUpdater $rankingUpdater;

    public function setUp(): void
    {
        $this->rankingUpdater = new RankingUpdater(new InMemoryRankingRepository());
    }

    public function testFindTopSuccessful()
    {
        $top = $this->rankingUpdater->findTop(3);

        $this->assertEquals(3, $top->count());
    }

    public function testFindTopOutOfBounds()
    {
        $this->expectException(IncorrectParamsForRankingSearchException::class);

        $this->rankingUpdater->findTop(30000000000000);
    }

    public function testFindRelativePositionSuccessful()
    {
        $relative = $this->rankingUpdater->findRelativePosition(2, 1);

        $this->assertEquals(3, $relative->count());
    }

    public function testFindRelativePositionOutOfBounds()
    {
        $this->expectException(IncorrectParamsForRankingSearchException::class);

        $this->rankingUpdater->findRelativePosition(30000000000000, 10);
    }
}
