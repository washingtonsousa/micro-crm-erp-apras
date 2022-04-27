<?php
namespace App\Core\Domain\Command;

use App\Core\Domain\Abstraction\Command\Command;
use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Abstraction\Interface\IUsuarioRepository;
use App\Core\Domain\Command\Result\GetUsersCommandResult;
use App\Core\Domain\Entity\Usuario;
use DateTime;
use Exception;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class GetUsersCommand extends Command {


    private IUsuarioRepository $userRepo;


    public function __construct(IUsuarioRepository $userRepo)
    {
        parent::__construct();
        $this->userRepo = $userRepo;
            
    }

    public function GenerateResult() {

        try {
            


           $users = $this->userRepo->get(); 
            $this->setResult(new GetUsersCommandResult($users));


        } catch(Exception $ex) {
            var_dump($ex->getMessage());
            $this->setResult(new GetUsersCommandResult(null));
        }
    }

    public function ValidateResult() {
            //TODO
            return  $this->contract;//->MustBeNotNull($this->getResult()->getUser(), "Ocorreu um problema ao tentar cadastrar o usuário, consulte logs para maiores detalhes");
    }

}
