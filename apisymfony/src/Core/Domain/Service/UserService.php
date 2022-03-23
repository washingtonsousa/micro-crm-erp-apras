<?php
namespace App\Core\Domain\Service;

use App\Core\Domain\Abstraction\Interface\IUserInterface;
use App\Core\Domain\Command\CreateUserCommand;
use App\Core\Domain\Entity\User;

class UserService implements IUserInterface {

    private IUserRepository $_userRepo;

public function Auth(User $user) {

}

public function Subscribe(User $user) {


    

        $command = new CreateUserCommand($user,$this->_userRepo);

        $result = $command->Execute();

        if($result->isSuccess())
                return $result->createToken('Laravel-9-Passport-Auth')->accessToken;

        return null;

}



}