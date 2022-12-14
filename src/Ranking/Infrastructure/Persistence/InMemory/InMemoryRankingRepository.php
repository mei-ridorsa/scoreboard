<?php

namespace App\Ranking\Infrastructure\Persistence\InMemory;

use Exception;
use App\Ranking\Domain\Exception\IncorrectParamsForRankingSearchException;
use App\Ranking\Domain\RankingRepository;
use App\User\Domain\UserCollection;

class InMemoryRankingRepository implements RankingRepository
{
    private UserCollection $data;

    /**
     * @throws Exception
     */
    public function __construct(UserCollection $data)
    {
        $this->data = $data;
        $this->data->sort();
    }

    /**
     * @throws IncorrectParamsForRankingSearchException
     */
    public function findTop(int $topNumber): UserCollection
    {
        if ($topNumber > count($this->data->getUsers())) {
            throw new IncorrectParamsForRankingSearchException('Find Top is out of bounds');
        }

        return UserCollection::fromSlice($this->data, 0, $topNumber);
    }

    /**
     * @throws IncorrectParamsForRankingSearchException
     */
    public function findRelativePosition(int $position, int $width): UserCollection
    {
        if (($position - $width < 0) || ($position + $width > count($this->data->getUsers()))) {
            throw new IncorrectParamsForRankingSearchException('Relative position is out of bounds');
        }

        return UserCollection::fromSlice($this->data, $position - $width - 1, ($width * 2) + 1);
    }
}
