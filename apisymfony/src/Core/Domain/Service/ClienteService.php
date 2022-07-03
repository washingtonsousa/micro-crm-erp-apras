<?php
namespace App\Core\Domain\Service;

use App\Core\Domain\Abstraction\Interface\IClienteRepository;
use App\Core\Domain\Abstraction\Interface\IClienteService;
use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Command\CheckIfClienteExistsCommand;
use App\Core\Domain\Command\GetEntityCommand;
use App\Core\Domain\Entity\Cliente;

class ClienteService implements IClienteService {


        public function __construct(
                private IUnityOfWork $unityOfWork, 
                private IClienteRepository $repo)
        {
                $this->unityOfWork = $unityOfWork;
                $this->repo = $repo;

        }

        public function CheckIfExists(Cliente $cliente) : ?bool {
                
                         $command = new CheckIfClienteExistsCommand($cliente, $this->repo);
                         $result = $command->Execute();

                         if($result->isSuccess())
                                 return $result->getResult();

                        return null;

        }

       public function remove($id) : bool {

                $clienteForUpdate = $this->getById($id); 

                if($clienteForUpdate == null)
                        return false;

                $this->unityOfWork->Remove($clienteForUpdate);

                $stmResult =  $this->unityOfWork->Commit();
        
                if($stmResult->isSuccess())
                        return true;

                return false;
        }


        public function getById(int $id): ?Cliente
        {
                
                $command = new GetEntityCommand($id, $this->repo);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getEntity();

                return null;
        }



}