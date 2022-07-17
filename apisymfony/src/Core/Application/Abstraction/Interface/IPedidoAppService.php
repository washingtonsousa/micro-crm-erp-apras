<?php
namespace App\Core\Application\Abstraction\Interface;

use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\ViewModel\ClienteViewModel;
use App\Core\Application\ViewModel\PedidoViewModel;
use App\Core\Application\ViewModel\ProdutoViewModel;

interface IPedidoAppService {

        public function getById(int $id) : ?PedidoViewModel;
        public function update(PedidoViewModel $cliente, $id) : ?PedidoViewModel;
        public function subscribe(PedidoViewModel $produto) : ?PedidoViewModel;
        public function get(PaginatedEntityRequestViewModel $paramsModel) : PaginationAggregatorViewModel;
        public function remove($id) : bool;
        public function partialUpdate(PedidoViewModel $pedidoViewModel, $id) : ?PedidoViewModel;

}
