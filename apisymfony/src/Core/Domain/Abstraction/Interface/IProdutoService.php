<?php
namespace App\Core\Domain\Abstraction\Interface;

use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetProdutoPaginatedEntityQuery;
use App\Core\Domain\Entity\Produto;

interface IProdutoService {

            public function update(Produto $user, $id, $changeSenha = false);
            public function subscribe(Produto $user);
            public function getById(int $id) : ?Produto;
            public function get(GetProdutoPaginatedEntityQuery $paginatedQuery) : PaginationAggregator;
            public function remove($id) : bool;
}