<?php
namespace App\Core\Application\Service;

use App\Core\Application\Abstraction\Interface\IProdutoAppService;
use App\Core\Application\Abstraction\Interface\IProdutoImagemAppService;
use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\ViewModel\ProdutoViewModel;
use App\Core\Domain\Abstraction\Interface\IProdutoService;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\Produto;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetProdutoPaginatedEntityQuery;
use App\Core\Shared\Mapper\AutoMapperInitializer;
use AutoMapperPlus\AutoMapperInterface;

class ProdutoImagemAppService implements IProdutoImagemAppService {

    protected IProdutoService $service;
    protected AutoMapperInterface $mapper;

    public function __construct(IProdutoService $service,
     AutoMapperInitializer $mapperInitializer)
    {
        $this->service = $service;
        $this->mapper = $mapperInitializer->getMapper();
    }

    public function add(int $id) : mixed {

        return null;
    }


}
