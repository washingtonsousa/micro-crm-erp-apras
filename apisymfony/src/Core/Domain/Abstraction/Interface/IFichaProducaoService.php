<?php
namespace App\Core\Domain\Abstraction\Interface;

use App\Core\Domain\Entity\FichaProducao;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetPedidoPaginatedEntityQuery;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetProdutoPaginatedEntityQuery;
use App\Core\Domain\Entity\Pedido;
use App\Core\Domain\Entity\Produto;

interface IFichaProducaoService {

            public function update(FichaProducao $pedido, $id);
            public function subscribe(FichaProducao $pedido);
            public function getById(int $id) : ?Pedido;
            public function get(GetPedidoPaginatedEntityQuery $paginatedQuery) : PaginationAggregator;
            public function remove($id) : bool;
}