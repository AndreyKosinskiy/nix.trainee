<?php

namespace Models\Users;

use Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{

    protected string $nickname;
    protected string $email;
    protected int $isConfirmend;
    protected string $role;
    protected string $passwordHash;
    protected string $authToken;
    protected $createAt;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getNickName(): string
    {
        return $this->nickname;
    }

    protected static function getTableName(): string
    {
        return 'users';
    }

}