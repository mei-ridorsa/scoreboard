<?php

namespace ScoreBoard\User\Application;

use Exception;
use PHPUnit\Framework\TestCase;
use ScoreBoard\User\Domain\Exception\UserNotFoundException;
use ScoreBoard\User\Domain\User;
use ScoreBoard\User\Domain\UserCollection;
use ScoreBoard\User\Infrastructure\Persistence\InMemory\InMemoryUserRepository;

class ScoreUpdaterTest extends TestCase
{
    private ScoreUpdater $scoreUpdater;

    /**
     * @throws Exception
     */
    public function setUp(): void
    {
        $users = [
            new User(1, 0),
            new User(2, 100),
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

        $this->scoreUpdater = new ScoreUpdater(new InMemoryUserRepository(new UserCollection($users)));
    }

    /**
     * @throws UserNotFoundException
     */
    public function testSetScoreSuccessful()
    {
        $user = $this->scoreUpdater->setScore(1, 30);

        $this->assertEquals(30, $user->getScore());
    }

    /**
     * @throws UserNotFoundException
     */
    public function testSetScoreUserNotFound()
    {
        $this->expectException(UserNotFoundException::class);

        $this->scoreUpdater->setScore(10000, 30);
    }

    /**
     * @throws UserNotFoundException
     */
    public function testAddScoreSuccessful()
    {
        $user = $this->scoreUpdater->addScore(2, 10);

        $this->assertEquals(110, $user->getScore());
    }

    /**
     * @throws UserNotFoundException
     */
    public function testAddScoreUserNotFound()
    {
        $this->expectException(UserNotFoundException::class);

        $this->scoreUpdater->setScore(10000, 110);
    }
}
