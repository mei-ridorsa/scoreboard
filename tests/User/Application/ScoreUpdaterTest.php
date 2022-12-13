<?php

namespace ScoreBoard\User\Application;

use PHPUnit\Framework\TestCase;
use ScoreBoard\User\Domain\Exception\UserNotFoundException;
use ScoreBoard\User\Infrastructure\Persistence\InMemory\InMemoryUserRepository;

class ScoreUpdaterTest extends TestCase
{
    private ScoreUpdater $scoreUpdater;

    public function setUp(): void
    {
        $this->scoreUpdater = new ScoreUpdater(new InMemoryUserRepository());
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
