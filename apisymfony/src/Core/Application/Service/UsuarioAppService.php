<?php
namespace App\Core\Application\Service;

use App\Core\Application\Abstraction\Interface\IUsuarioAppService;
use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Domain\Abstraction\Interface\IUsuarioService;
use App\Core\Domain\Entity\Usuario;

class UsuarioAppService implements IUsuarioAppService {

    protected IUsuarioService $userService;

    public function __construct(IUsuarioService $userService)
    {
        $this->userService = $userService;
    }

    public function register(UsuarioViewModel $userViewModel) {

        $usuario = $userViewModel->ToDomainModel();

        $result =  $this->userService->Subscribe($usuario);
     
        if($result == null)
            return null;

        return  $result;


    }



}
