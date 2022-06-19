<?php
namespace App\Core\Domain\Abstraction\Interface;

use App\Core\Domain\Entity\FichaProducao;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetFichaProducaoPaginatedEntityQuery;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetPedidoPaginatedEntityQuery;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetProdutoPaginatedEntityQuery;
use App\Core\Domain\Entity\Pedido;
use App\Core\Domain\Entity\Produto;

interface IFichaProducaoService {

            public function update(FichaProducao $fichaProducao, $id);
            public function subscribe(FichaProducao $fichaProducao);
            public function getById(int $id) : ?FichaProducao;
            public function get(GetFichaProducaoPaginatedEntityQuery $paginatedQuery) : PaginationAggregator;
            public function remove($id) : bool;
}