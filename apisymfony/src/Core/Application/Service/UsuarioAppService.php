<?php
namespace App\Core\Application\Service;

use App\Core\Application\Abstraction\Interface\Service\IUserAppService;
use App\Core\Application\Abstraction\Interface\Service\IUsuarioAppService;
use App\Core\Application\ViewModel\UserViewModel;
use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Abstraction\Interface\IUserService;
use App\Core\Domain\Abstraction\Interface\IUsuarioService;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsuarioAppService implements IUsuarioAppService{



    protected IUsuarioService $userService;
  

    public function __construct(IUsuarioService $userService)
    {
        $this->userService = $userService;
    }

    public function register(UsuarioViewModel $userViewModel) {


        $this->userService->Subscribe($userViewModel->ToDomainModel());

    }



}
