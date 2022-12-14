<?php

namespace App\User\Domain;

interface UserRepository
{
    public function findUser(string $id): ?User;
}
