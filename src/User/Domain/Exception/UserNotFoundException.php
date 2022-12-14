<?php

namespace App\User\Domain\Exception;

use Exception;
use JetBrains\PhpStorm\Pure;

class UserNotFoundException extends Exception
{
    #[Pure]
    public static function fromUserId($userId): self
    {
        return new self('No user with id '. $userId . " in our system");
    }
}
