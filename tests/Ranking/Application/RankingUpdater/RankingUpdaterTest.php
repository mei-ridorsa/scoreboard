<?php

namespace ScoreBoard\Ranking\Application\RankingUpdater;

use Exception;
use PHPUnit\Framework\TestCase;
use ScoreBoard\Ranking\Domain\Exception\IncorrectParamsForRankingSearchException;
use ScoreBoard\Ranking\Infrastructure\Persistence\InMemory\InMemoryRankingRepository;
use ScoreBoard\User\Domain\User;
use ScoreBoard\User\Domain\UserCollection;

class RankingUpdaterTest extends TestCase
{
    private RankingUpdater $rankingUpdater;

    /**
     * @throws Exception
     */
    public function setUp(): void
    {
        $users = [
            new User(1, 0),
            new User(2, 43),
            new User(3, 453),
            new User(4, 32),
            new User(5, 678),
            new User(6, 2342),
            new User(7, 346),
            new User(8, 35465),
            new User(9, 6236),
            new User(10, 3572),
            new User(11, 24),
            new User(12, 567),
            new User(13, 245),
            new User(14, 5473),
            new User(15, 4567),
            new User(16, 567),
            new User(17, 2345),
            new User(18, 45745),
            new User(19, 567),
            new User(20, 3)
        ];

        $this->rankingUpdater = new RankingUpdater(new InMemoryRankingRepository(new UserCollection($users)));
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
