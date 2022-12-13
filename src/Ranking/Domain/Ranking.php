<?php

namespace ScoreBoard\Ranking\Domain;

use ScoreBoard\User\Domain\UserCollection;

class Ranking
{
    private UserCollection $usersRanked;

    public function __construct(UserCollection $usersRanked)
    {
        $this->usersRanked = $usersRanked;
    }
}
