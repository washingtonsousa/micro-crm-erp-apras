<?php
namespace App\Core\Domain\Command\Result;

use App\Core\Domain\Entity\User;

class CreateUserCommandResult {

    private ?User $user;

    public function __construct(?User $user)
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
