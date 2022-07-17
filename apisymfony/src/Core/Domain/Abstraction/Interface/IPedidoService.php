<?php
namespace App\Core\Domain\Abstraction\Interface;

use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetPedidoPaginatedEntityQuery;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetProdutoPaginatedEntityQuery;
use App\Core\Domain\Entity\Pedido;
use App\Core\Domain\Entity\Produto;

interface IPedidoService {

            public function partialUpdate(Pedido $pedido, $id);
            public function update(Pedido $pedido, $id);
            public function subscribe(Pedido $pedido);
            public function getById(int $id) : ?Pedido;
            public function get(GetPedidoPaginatedEntityQuery $paginatedQuery) : PaginationAggregator;
            public function remove($id) : bool;
            
}