<?php

namespace App\Ranking\Domain;

use App\User\Domain\UserCollection;

class Ranking
{
    private UserCollection $usersRanked;

    public function __construct(UserCollection $usersRanked)
    {
        $this->usersRanked = $usersRanked;
    }
}
