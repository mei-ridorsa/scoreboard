<?php

namespace ScoreBoard\User\Domain;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testCorrectAddition()
    {
        $user = new User(1, 1);

        $user->addScore(3);

        $this->assertEquals(4, $user->getScore());
    }
}
