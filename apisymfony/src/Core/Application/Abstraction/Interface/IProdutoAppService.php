<?php
namespace App\Core\Application\Abstraction\Interface;

use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\ProdutoPaginationAggregatorViewModel;
use App\Core\Application\ViewModel\ClienteViewModel;
use App\Core\Application\ViewModel\ProdutoViewModel;

interface IProdutoAppService {

        public function getById(int $id) : ?ProdutoViewModel;
        public function update(ProdutoViewModel $cliente, $id) : ?ProdutoViewModel;
        public function subscribe(ProdutoViewModel $produto) : ?ProdutoViewModel;
        public function get(PaginatedEntityRequestViewModel $paramsModel) : ProdutoPaginationAggregatorViewModel;
        public function remove($id) : bool;

}
