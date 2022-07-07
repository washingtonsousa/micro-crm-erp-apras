<?php
namespace App\Core\Domain\Command;

use App\Core\Domain\Abstraction\Command\Command;
use App\Core\Domain\Abstraction\Interface\IClienteRepository;
use App\Core\Domain\Command\Result\CheckIfClienteExistsCommandResult;
use App\Core\Domain\Command\Result\CheckIfUserExistsCommandResult;
use App\Core\Domain\Entity\Cliente;
use Exception;

class CheckIfClienteExistsCommand extends Command {



    public function __construct( private Cliente $cliente, private IClienteRepository $repo)
    {
        parent::__construct();
    
            
    }

    public function GenerateResult() {

        try {
            


            $found = $this->repo->checkIfExists($this->cliente->getCodigoCliente(), $this->cliente->getNome()); 

            $this->setResult(new CheckIfClienteExistsCommandResult($found));


        } catch(Exception $ex) {

            $this->setResult(new CheckIfClienteExistsCommandResult(null));
        }
    }

    public function ValidateResult() {
            //TODO

            return  $this->contract->MustBeIsset($this->getResult()->getResult(), "Ocorreu um problema ao tentar verificar o cliente, consulte logs para maiores detalhes");
    }

}
