<?php
namespace App\Core\Application\Service;

use App\Core\Application\Abstraction\Interface\IClienteAppService;
use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\ClientePaginationAggregatorViewModel;
use App\Core\Application\ViewModel\ClienteViewModel;
use App\Core\Domain\Abstraction\Interface\IClienteRepository;
use App\Core\Domain\Abstraction\Interface\IClienteService;
use App\Core\Domain\Abstraction\Interface\IMultiEntityPaginationAggregatorService;
use App\Core\Domain\Abstraction\Interface\IPersistanceDomainService;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\Cliente;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetClientePaginatedEntityQuery;
use App\Core\Domain\Specification\ClienteSpecification;
use App\Core\Domain\UseCase\Abstractions\IClienteFullUpdateUseCase;
use App\Core\Shared\Mapper\AutoMapperInitializer;
use AutoMapperPlus\AutoMapperInterface;

class ClienteAppService implements IClienteAppService {

    protected AutoMapperInterface $mapper;

    public function __construct(private IClienteService $service, 
    private IClienteFullUpdateUseCase $updateUseCase,
    private IMultiEntityPaginationAggregatorService $multiEntityService,
    private IPersistanceDomainService $persistanceDomainService,
    private IClienteRepository $clienteRepo,
     AutoMapperInitializer $mapperInitializer)
    {
        $this->mapper = $mapperInitializer->getMapper();
    }

    public function subscribe(ClienteViewModel $clienteViewModel) : ?ClienteViewModel {

        $cliente = $this->mapper->map($clienteViewModel, Cliente::class);

         if(!ClienteSpecification::IsValidForInsert($cliente))
             return null;

        if(!ClienteSpecification::MustNotExists($this->service->CheckIfExists($cliente)))
            return null;

        $result =  $this->persistanceDomainService->persistEntity($cliente);
     
        if($result == null)
            return null;

        $clienteViewModel = $this->mapper->map($result, ClienteViewModel::class);

        return    $clienteViewModel ;


    }

    public function update(ClienteViewModel $clienteViewModel, $id) : ?ClienteViewModel {

        $cliente = $this->mapper->map($clienteViewModel, Cliente::class);

        $cliente->setIdCliente($id);

        $result =  $this->updateUseCase->Execute($cliente);   
        
        if($result == null)
            return null;

        $clienteViewModel = $this->mapper->map($result, ClienteViewModel::class);

        return  $clienteViewModel;


    }

    
    public function remove($id) : bool {
        
        return $this->service->remove($id);

    }


    public function get(PaginatedEntityRequestViewModel $paramsModel): ClientePaginationAggregatorViewModel
     {

        $params = $this->mapper->map($paramsModel, PaginatedEntityRequest::class);

        $query = new GetClientePaginatedEntityQuery($params);

        $domainResult  =$this->multiEntityService->get($query, $this->clienteRepo);

        $result =  $this->mapper->map( $domainResult, ClientePaginationAggregatorViewModel::class);

        return  $result;

    }

    public function getById(int $id): ?ClienteViewModel
    {

        $result =  $this->mapper->map($this->service->getById($id), ClienteViewModel::class);
        return  $result;

    }



}
