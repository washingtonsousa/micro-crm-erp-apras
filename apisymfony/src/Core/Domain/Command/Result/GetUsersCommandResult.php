<?php
namespace App\Core\Domain\Command\Result;


class GetUsersCommandResult {

    
    private mixed $users;

    public function __construct(mixed $users)
    {
        $this->users = $users;
    }

    public function getUsers() {
        return $this->users;
    }

    public function isSuccess() {
        return $this->users != null;
    }

}
