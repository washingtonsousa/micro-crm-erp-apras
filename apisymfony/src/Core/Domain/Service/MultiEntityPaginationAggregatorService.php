<?php
namespace App\Core\Domain\Service;

use App\Core\Domain\Abstraction\Interface\IClienteRepository;
use App\Core\Domain\Abstraction\Interface\IClienteService;
use App\Core\Domain\Abstraction\Interface\IMultiEntityPaginationAggregatorService;
use App\Core\Domain\Abstraction\Interface\IPaginatedRepository;
use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Abstraction\PaginatedEntityQuery;
use App\Core\Domain\Command\CheckIfClienteExistsCommand;
use App\Core\Domain\Command\GetEntityCommand;
use App\Core\Domain\Command\GetPageOfItemsCommand;
use App\Core\Domain\Command\PersistCommand;
use App\Core\Domain\Entity\Cliente;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetClientePaginatedEntityQuery;
use App\Core\Domain\Specification\ClienteSpecification;

class MultiEntityPaginationAggregatorService implements IMultiEntityPaginationAggregatorService {



        public function __construct()
        {
        }


        public function get(PaginatedEntityQuery $paginatedQuery, IPaginatedRepository $paginatedRepository): PaginationAggregator
        {

                $command = new GetPageOfItemsCommand($paginatedRepository, $paginatedQuery);

                $result = $command->Execute();  

                if($result->isSuccess())
                        return $result->getPaginationResult();

                return null;
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