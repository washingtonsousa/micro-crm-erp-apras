<?php
namespace App\Core\Domain\Service;

use App\Core\Domain\Abstraction\Interface\IFichaProducaoRepository;
use App\Core\Domain\Abstraction\Interface\IFichaProducaoService;
use App\Core\Domain\Abstraction\Interface\IPedidoRepository;
use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Command\GetEntityCommand;
use App\Core\Domain\Command\GetPageOfItemsCommand;
use App\Core\Domain\Command\PersistCommand;
use App\Core\Domain\Entity\FichaProducao;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetFichaProducaoPaginatedEntityQuery;
use App\Core\Domain\Entity\Pedido;
use App\Core\Shared\Resolver\DependencyResolver;

class FichaProducaoService implements IFichaProducaoService {

    private IFichaProducaoRepository $fichaRepo;
    private IUnityOfWork $unityOfWork;

    public function __construct(IUnityOfWork $unityOfWork, IFichaProducaoRepository $fichaRepo)
    {
            $this->unityOfWork = $unityOfWork;
            $this->fichaRepo = $fichaRepo;
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


        public function update(FichaProducao $pedido, $id, $changeSenha = false) {

                $pedidoForUpdate = $this->getById($id); 
                
                //$pedidoForUpdate->fullUpdate($pedido);


                $command = new PersistCommand($pedidoForUpdate, $this->unityOfWork);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getEntity();

                return null;
        }

        public function subscribe(FichaProducao $fichaProducao) {

                 $command = new PersistCommand($fichaProducao, $this->unityOfWork);
                 $result = $command->Execute();

                 DependencyResolver::make("app.logger")->info('FichaProducaoService:subscribe');


                 if($result->isSuccess())
                         $pedido = $result->getEntity();

                 return $pedido;

        }


        public function get(GetFichaProducaoPaginatedEntityQuery $paginatedQuery) : PaginationAggregator {

                $command = new GetPageOfItemsCommand($this->fichaRepo, $paginatedQuery);

                DependencyResolver::make("app.logger")->info('FichaProducaoService:get');

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getPaginationResult();

                return null;
        }


        public function getById(int $id) : ?FichaProducao {
                
                $command = new GetEntityCommand($id, $this->fichaRepo);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getEntity();

                return null;
        }



}