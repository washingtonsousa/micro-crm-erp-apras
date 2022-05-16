<?php
namespace App\Core\Application\Abstraction\Interface;

use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\ClientePaginationAggregatorViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\ViewModel\ClienteViewModel;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;

interface IClienteAppService {
        public function getById(int $id) : ?ClienteViewModel;
        public function update(ClienteViewModel $cliente, $id) : ?ClienteViewModel;
        public function subscribe(ClienteViewModel $cliente) : ?ClienteViewModel;
        public function get(PaginatedEntityRequestViewModel $paramsModel) : ClientePaginationAggregatorViewModel;
        public function remove($id) : bool;
}
