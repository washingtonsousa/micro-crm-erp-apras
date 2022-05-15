<?php
namespace App\Core\Application\Service;

use App\Core\Application\Abstraction\Interface\IProdutoAppService;
use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\ViewModel\ProdutoViewModel;
use App\Core\Domain\Abstraction\Interface\IProdutoService;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\Produto;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetProdutoPaginatedEntityQuery;
use App\Core\Shared\Mapper\AutoMapperInitializer;
use AutoMapperPlus\AutoMapperInterface;

class ProdutoAppService implements IProdutoAppService {

    protected IProdutoService $service;
    protected AutoMapperInterface $mapper;

    public function __construct(IProdutoService $service,
     AutoMapperInitializer $mapperInitializer)
    {
        $this->service = $service;

        $this->mapper = $mapperInitializer->getMapper();
    }

    public function subscribe(ProdutoViewModel $produtoViewModel) : ?ProdutoViewModel {

        $cliente = $this->mapper->map($produtoViewModel, Produto::class);

        // if(!UsuarioSpecification::IsValidForInsert($usuario))
        //     return null;

        $result =  $this->service->subscribe($cliente);
     
        if($result == null)
            return null;

        $userViewModel = $this->mapper->map($result, ProdutoViewModel::class);


        return    $userViewModel ;


    }

    public function update(ProdutoViewModel $produtoViewModel, $id) : ProdutoViewModel {

        $usuario = $this->mapper->map($produtoViewModel, Produto::class);

        $result =  $this->service->update($usuario, $id);
     
        if($result == null)
            return null;

        $produtoViewModel = $this->mapper->map($result, ProdutoViewModel::class);

        return    $produtoViewModel ;


    }

    
    public function remove($id) : bool {
        
        return $this->service->remove($id);

    }


    public function get(PaginatedEntityRequestViewModel $paramsModel): PaginationAggregatorViewModel
     {

        $params = $this->mapper->map($paramsModel, PaginatedEntityRequest::class);

        $query = new GetProdutoPaginatedEntityQuery($params);

        $domainResult  =$this->service->get($query);

        $result =  $this->mapper->map( $domainResult, PaginationAggregatorViewModel::class);
        return  $result;
    }

    public function getById(int $id): ?ProdutoViewModel
    {

        $result =  $this->mapper->map($this->service->getById($id), ProdutoViewModel::class);
        return  $result;

    }



}
