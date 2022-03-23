<?php
namespace App\Core\Application\Service;

use App\Core\Application\Abstraction\Interface\Service\IUserAppService;
use App\Core\Application\ViewModel\UserViewModel;
use App\Core\Domain\Abstraction\Interface\IUserService;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserAppService implements IUserAppService {



    protected IUserService $userService;


    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(UserViewModel $userViewModel) {

        $this->userService->Subscribe($userViewModel->ToDomainModel());

    }


    public function login() {

    }

}
