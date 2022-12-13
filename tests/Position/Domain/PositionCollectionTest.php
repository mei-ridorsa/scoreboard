<?php

namespace ScoreBoard\Position\Domain;

use PHPUnit\Framework\TestCase;
use ScoreBoard\User\Domain\User;

class PositionCollectionTest extends TestCase
{

    private PositionCollection $collection;

    public function setUp(): void
    {
        $this->collection = new PositionCollection([
            new Position(1, new User(1, 1)),
            new Position(2, new User(2, 2)),
            new Position(3, new User(3, 3)),
            new Position(4, new User(4, 4)),
            new Position(5, new User(5, 5)),
            new Position(6, new User(6, 6)),
            new Position(7, new User(7, 7)),
            new Position(8, new User(8, 8)),
            new Position(9, new User(9, 9)),
            new Position(10, new User(10, 10)),
            new Position(11, new User(11, 11)),
            new Position(12, new User(12, 12)),
            new Position(13, new User(13, 13)),
            new Position(14, new User(14, 14)),
            new Position(15, new User(15, 15)),
            new Position(16, new User(16, 16)),
            new Position(17, new User(17, 17)),
            new Position(18, new User(18, 18)),
            new Position(19, new User(19, 19)),
            new Position(20, new User(20, 20)),
            new Position(21, new User(21, 21)),
            new Position(22, new User(22, 22)),
            new Position(23, new User(23, 23)),
            new Position(24, new User(24, 24)),
            new Position(25, new User(25, 25))
        ]);
    }

    public function testCorrectSlice(): void
    {
        $expected = new PositionCollection([
            new Position(6, new User(6, 6)),
            new Position(7, new User(7, 7)),
            new Position(8, new User(8, 8)),
            new Position(9, new User(9, 9)),
            new Position(10, new User(10, 10))
        ]);

        $sliced = PositionCollection::fromSlice($this->collection, 5, 5);

        $this->assertEquals($expected->getPositions(), $sliced->getPositions());
    }

    public function testIncorrectSlice(): void
    {
        $expected = new PositionCollection([
            new Position(7, new User(7, 7)),
            new Position(8, new User(8, 8)),
            new Position(9, new User(9, 9)),
            new Position(10, new User(10, 10))
        ]);

        $sliced = PositionCollection::fromSlice($this->collection, 5, 5);

        $this->assertNotEquals($expected->getPositions(), $sliced->getPositions());
    }
}
