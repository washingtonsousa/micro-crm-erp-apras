<?php
namespace App\Core\Application\Service;

use App\Core\Application\Abstraction\Interface\IClienteAppService;
use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\ClientePaginationAggregatorViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\ViewModel\ClienteViewModel;
use App\Core\Domain\Abstraction\Interface\IClienteService;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\Cliente;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetClientePaginatedEntityQuery;
use App\Core\Shared\Mapper\AutoMapperInitializer;
use AutoMapperPlus\AutoMapperInterface;

class ClienteAppService implements IClienteAppService {

    protected IClienteService $service;
    protected AutoMapperInterface $mapper;

    public function __construct(IClienteService $service,
     AutoMapperInitializer $mapperInitializer)
    {
        $this->service = $service;

        $this->mapper = $mapperInitializer->getMapper();
    }

    public function subscribe(ClienteViewModel $clienteViewModel) : ?ClienteViewModel {

        $cliente = $this->mapper->map($clienteViewModel, Cliente::class);

        // if(!UsuarioSpecification::IsValidForInsert($usuario))
        //     return null;

        $result =  $this->service->subscribe($cliente);
     
        if($result == null)
            return null;

        $userViewModel = $this->mapper->map($result, ClienteViewModel::class);


        return    $userViewModel ;


    }

    public function update(ClienteViewModel $clienteViewModel, $id) : ClienteViewModel {

        $usuario = $this->mapper->map($clienteViewModel, Cliente::class);

        $result =  $this->service->update($usuario, $id);
     
        if($result == null)
            return null;

        $clienteViewModel = $this->mapper->map($result, ClienteViewModel::class);

        return    $clienteViewModel ;


    }

    
    public function remove($id) : bool {
        
        return $this->service->remove($id);

    }


    public function get(PaginatedEntityRequestViewModel $paramsModel): ClientePaginationAggregatorViewModel
     {

        $params = $this->mapper->map($paramsModel, PaginatedEntityRequest::class);

        $query = new GetClientePaginatedEntityQuery($params);

        $domainResult  =$this->service->get($query);

        $result =  $this->mapper->map( $domainResult, ClientePaginationAggregatorViewModel::class);

        return  $result;

    }

    public function getById(int $id): ?ClienteViewModel
    {

        $result =  $this->mapper->map($this->service->getById($id), ClienteViewModel::class);
        return  $result;

    }



}
