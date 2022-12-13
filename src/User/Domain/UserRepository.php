<?php

namespace ScoreBoard\User\Domain;

interface UserRepository
{
    public function findUser(string $id): ?User;
}
