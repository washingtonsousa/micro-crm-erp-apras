<?php
namespace App\Core\Domain\Command\Result;

use App\Core\Domain\Entity\UserEntity;

class CreateUserCommandResult {

    private ?UserEntity $user;

    public function __construct(?UserEntity $user)
    {
        $this->user = $user;
    }

    public function getUser() {
        return $this->user;
    }

    public function isSuccess() {
        return $this->user != null;
    }

}
