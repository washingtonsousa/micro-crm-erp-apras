<?php
namespace App\Core\Domain\Command;

use App\Core\Domain\Abstraction\Command\Command;
use App\Core\Domain\Abstraction\Interface\IUsuarioRepository;
use App\Core\Domain\Command\Result\CheckIfUserExistsCommandResult;
use App\Core\Domain\Entity\Usuario;
use Exception;

class CheckIfUserExistsCommand extends Command {


    private Usuario $user;
    private IUsuarioRepository $userRepo;

    public function __construct(Usuario $user, IUsuarioRepository $userRepo)
    {
        parent::__construct();
        $this->user = $user;
        $this->userRepo = $userRepo;
            
    }

    public function GenerateResult() {

        try {
            


            $found = $this->userRepo->checkIfExists($this->user->getDocumento(), $this->user->getEmail()); 

            $this->setResult(new CheckIfUserExistsCommandResult($found));


        } catch(Exception $ex) {

            $this->setResult(new CheckIfUserExistsCommandResult(null));
        }
    }

    public function ValidateResult() {
            //TODO

            return  $this->contract->MustBeIsset($this->getResult()->getResult(), "Ocorreu um problema ao tentar verificar o usuário, consulte logs para maiores detalhes");
    }

}
