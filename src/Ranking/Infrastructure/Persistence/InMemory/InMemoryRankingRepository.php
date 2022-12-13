<?php

namespace ScoreBoard\Ranking\Infrastructure\Persistence\InMemory;

use Exception;
use ScoreBoard\Position\Domain\Position;
use ScoreBoard\Position\Domain\PositionCollection;
use ScoreBoard\Ranking\Domain\Exception\IncorrectParamsForRankingSearchException;
use ScoreBoard\Ranking\Domain\RankingRepository;
use ScoreBoard\User\Domain\User;

class InMemoryRankingRepository implements RankingRepository
{
    private PositionCollection $data;

    private array $positions = [
        ['number' => 1, 'user' => 1],
        ['number' => 2, 'user' => 2],
        ['number' => 3, 'user' => 3],
        ['number' => 4, 'user' => 4],
        ['number' => 5, 'user' => 5],
        ['number' => 6, 'user' => 6],
        ['number' => 7, 'user' => 7],
        ['number' => 8, 'user' => 8],
        ['number' => 9, 'user' => 9],
        ['number' => 10, 'user' => 10],
        ['number' => 11, 'user' => 11],
        ['number' => 12, 'user' => 12],
        ['number' => 13, 'user' => 13],
        ['number' => 14, 'user' => 14],
        ['number' => 15, 'user' => 15]
    ];

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $positionObjects = [];
        foreach ($this->positions as $position) {
            $positionObjects[] = Position::fromUserAndNumber(new User($position['user'], 0), $position['number']);
        }

        $this->data = new PositionCollection($positionObjects);
        $this->data->sort();
    }

    /**
     * @throws IncorrectParamsForRankingSearchException
     */
    public function findTop(int $topNumber): PositionCollection
    {
        if ($topNumber > count($this->data->getPositions())) {
            throw new IncorrectParamsForRankingSearchException('Find Top is out of bounds');
        }

        return PositionCollection::fromSlice($this->data, 0, $topNumber);
    }

    /**
     * @throws IncorrectParamsForRankingSearchException
     */
    public function findRelativePosition(int $position, int $width): PositionCollection
    {
        if (($position - $width < 0) || ($position + $width > count($this->data->getPositions()))) {
            throw new IncorrectParamsForRankingSearchException('Relative position is out of bounds');
        }

        return PositionCollection::fromSlice($this->data, $position - $width - 1, ($width * 2) + 1);
    }
}
