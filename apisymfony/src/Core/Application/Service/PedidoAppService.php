<?php
namespace App\Core\Application\Service;

use App\Core\Application\Abstraction\Interface\IPedidoAppService;
use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PedidoPaginationAggregatorViewModel;
use App\Core\Application\ViewModel\PedidoViewModel;
use App\Core\Domain\Abstraction\Interface\IPedidoService;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\Pedido;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetPedidoPaginatedEntityQuery;
use App\Core\Shared\Mapper\AutoMapperInitializer;
use AutoMapperPlus\AutoMapperInterface;

class PedidoAppService implements IPedidoAppService {

    protected IPedidoService $service;
    protected AutoMapperInterface $mapper;

    public function __construct(IPedidoService $service,
     AutoMapperInitializer $mapperInitializer)
    {
        $this->service = $service;
        $this->mapper = $mapperInitializer->getMapper();
    }

    public function subscribe(PedidoViewModel $pedidoViewModel) : ?PedidoViewModel {

        $pedido = $this->mapper->map($pedidoViewModel, Pedido::class);


        $result =  $this->service->subscribe($pedido);
     
        if($result == null)
            return null;

        $pedidoViewModel = $this->mapper->map($result, PedidoViewModel::class);

        return  $pedidoViewModel;

    }

    public function update(PedidoViewModel $pedidoViewModel, $id) : PedidoViewModel {

        $usuario = $this->mapper->map($pedidoViewModel, Pedido::class);

        $result =  $this->service->update($usuario, $id);
     
        if($result == null)
            return null;

        $pedidoViewModel = $this->mapper->map($result, PedidoViewModel::class);

        return    $pedidoViewModel ;


    }

    
    public function remove($id) : bool {
        
        return $this->service->remove($id);

    }


    public function get(PaginatedEntityRequestViewModel $paramsModel): PaginationAggregatorViewModel
     {

        $params = $this->mapper->map($paramsModel, PaginatedEntityRequest::class);

        $query = new GetPedidoPaginatedEntityQuery($params);

        $domainResult  =$this->service->get($query);

        $result =  $this->mapper->map($domainResult, PedidoPaginationAggregatorViewModel::class);
        return  $result;
    }

    public function getById(int $id): ?PedidoViewModel
    {

        $pedido = $this->service->getById($id);

        if($pedido == null)
                return null;

        $result =  $this->mapper->map($pedido, PedidoViewModel::class);

        return  $result;

    }



}
