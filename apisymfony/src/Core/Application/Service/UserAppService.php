<?php
namespace App\Core\Application\Service;

use App\Core\Application\Abstraction\Interface\Service\IUserAppService;
use App\Core\Application\ViewModel\UserViewModel;
use App\Core\Domain\Abstraction\Interface\IUserRepository;
use App\Core\Domain\Command\CreateUserCommand;

class UserAppService implements IUserAppService {

    private IUserRepository $_userRepo;


    public function __construct(IUserRepository $userRepo)
    {
            $this->_userRepo = $userRepo;
    }

    public function register(UserViewModel $userViewModel) {

        $userEntity = $userViewModel->ToDomainModel();

        $command = new CreateUserCommand($userEntity,$this->_userRepo);

        $result = $command->Execute();

        if($result->isSuccess())
                return $result->createToken('Laravel-9-Passport-Auth')->accessToken;

        return null;

    }


    public function login() {

    }

}
