<?php
namespace App\Core\Domain\Command\Result;

use App\Core\Domain\Entity\Usuario;

class UpdateUserCommandResult {

    private ?Usuario $user;

    public function __construct(?Usuario $user)
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
