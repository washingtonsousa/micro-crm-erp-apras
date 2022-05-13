<?php
namespace App\Core\Application\Abstraction\Interface;

use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\ViewModel\ClienteViewModel;

interface IClienteAppService {
        public function getClienteById(int $id) : ?ClienteViewModel;
        public function update(ClienteViewModel $cliente, $id) : ?ClienteViewModel;
        public function subscribe(ClienteViewModel $userViewModel) : ?ClienteViewModel;
        public function getClientes(PaginatedEntityRequestViewModel $paramsModel) : PaginationAggregatorViewModel;
        public function remove($id) : bool;
}
