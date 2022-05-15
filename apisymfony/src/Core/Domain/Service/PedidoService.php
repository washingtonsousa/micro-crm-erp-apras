<?php
namespace App\Core\Domain\Service;

use App\Core\Domain\Abstraction\Interface\IPedidoService;
use App\Core\Domain\Abstraction\Interface\IPedidoRepository;
use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Command\GetEntityCommand;
use App\Core\Domain\Command\GetPageOfItemsCommand;
use App\Core\Domain\Command\PersistCommand;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetPedidoPaginatedEntityQuery;
use App\Core\Domain\Entity\Pedido;

class PedidoService implements IPedidoService {

    private IPedidoRepository $pedidoRepo;
    private IUnityOfWork $unityOfWork;

    public function __construct(IUnityOfWork $unityOfWork, IPedidoRepository $pedidoRepo)
    {
            $this->unityOfWork = $unityOfWork;
            $this->pedidoRepo = $pedidoRepo;
    }



       public function remove($id) : bool {

                $pedidoForUpdate = $this->getById($id); 

                if($pedidoForUpdate == null)
                        return false;

                $this->unityOfWork->Remove($pedidoForUpdate);

                $stmResult =  $this->unityOfWork->Commit();
        
                if($stmResult->isSuccess())
                        return true;

                return false;
        }


        public function update(Pedido $pedido, $id, $changeSenha = false) {

                $pedidoForUpdate = $this->getById($id); 
                
                //$pedidoForUpdate->fullUpdate($pedido);


                $command = new PersistCommand($pedidoForUpdate, $this->unityOfWork);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getEntity();

                return null;
        }

        public function subscribe(Pedido $pedido) {
                

                // if(!PedidoSpecification::MustNotExists($this->CheckIfExists($pedido)))
                //     return null;


                $command = new PersistCommand($pedido, $this->unityOfWork);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getEntity();

                return null;

        }


        public function get(GetPedidoPaginatedEntityQuery $paginatedQuery) : PaginationAggregator {

                
                $command = new GetPageOfItemsCommand($this->pedidoRepo, $paginatedQuery);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getPaginationResult();

                return null;
        }


        public function getById(int $id) : ?Pedido {
                
                $command = new GetEntityCommand($id, $this->pedidoRepo);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getEntity();

                return null;
        }



}