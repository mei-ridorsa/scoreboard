<?php

namespace ScoreBoard\Position\Domain;

class PositionCollection
{
    private array $positions;

    public function __construct(array $positions)
    {
        /** @var  Position $position */
        foreach ($positions as $position) {
            $this->positions[] = $position;
        }
    }

    public function getPositions(): array
    {
        return $this->positions;
    }

    public function sort():void
    {
        usort($this->positions, function ($position1, $position2) {
            /**
             * @var Position $position1
             * @var Position $position2
             */
            return $position1->getNumber() <=> $position2->getNumber();
        });
    }

    public static function fromSlice(PositionCollection $original, int $offset, int $number): PositionCollection
    {
        return new self(array_slice($original->getPositions(), $offset, $number));
    }

    public function count(): int
    {
        return count($this->positions);
    }
}
