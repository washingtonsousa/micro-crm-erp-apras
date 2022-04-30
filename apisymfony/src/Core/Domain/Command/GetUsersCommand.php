<?php
namespace App\Core\Domain\Command;

use App\Core\Domain\Abstraction\Command\Command;
use App\Core\Domain\Abstraction\Interface\IUsuarioRepository;
use App\Core\Domain\Command\Result\GetPageOfItemsCommandResult;
use Exception;

class GetUsersCommand extends Command {


    private IUsuarioRepository $userRepo;


    public function __construct(IUsuarioRepository $userRepo)
    {
        parent::__construct();
        $this->userRepo = $userRepo;
            
    }

    public function GenerateResult() {

        try {
            

           $pagination = $this->userRepo->get(array(),0,0); 
           $this->setResult(new GetPageOfItemsCommandResult($pagination));


        } catch(Exception $ex) {
            
            $this->setResult(new GetPageOfItemsCommandResult(null));
        }
    }

    public function ValidateResult() {
            //TODO
            return  $this->contract;//->MustBeNotNull($this->getResult()->getUser(), "Ocorreu um problema ao tentar cadastrar o usuário, consulte logs para maiores detalhes");
    }

}
