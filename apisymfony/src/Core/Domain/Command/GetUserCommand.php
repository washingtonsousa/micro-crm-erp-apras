<?php
namespace App\Core\Domain\Command;

use App\Core\Domain\Abstraction\Command\Command;
use App\Core\Domain\Abstraction\Interface\IUsuarioRepository;
use App\Core\Domain\Command\Result\CreateUserCommandResult;
use App\Core\Domain\Command\Result\GetUserCommandResult;
use Exception;

class GetUserCommand extends Command {


    private int $id;
    private IUsuarioRepository $userRepo;

    public function __construct(int $id, IUsuarioRepository $userRepo)
    {
        parent::__construct();
        $this->id = $id;
        $this->userRepo =  $userRepo;
            
    }

    public function GenerateResult() {

        try {
            
            $usuario = $this->userRepo->getById($this->id);
            $this->setResult(GetUserCommandResult::WithUsuario($usuario));


        } catch(Exception $ex) {
            var_dump($ex->getMessage());
            $this->setResult(GetUserCommandResult::WithException($ex));
        }
    }

    public function ValidateResult() {
            //TODO
            return  $this->contract;
    }

}
