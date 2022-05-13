<?php
namespace App\Core\Domain\Abstraction\Interface;

use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\Cliente;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetClientePaginatedEntityQuery;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetUsuarioPaginatedEntityQuery;
use App\Core\Domain\Entity\Usuario;

interface IClienteService {

            public function update(Cliente $user, $id);
            public function subscribe(Cliente $user);
            public function getClienteById(int $id) : ?Cliente;
            public function getClientes(GetClientePaginatedEntityQuery $paginatedQuery) : PaginationAggregator;
            public function remove($id) : bool;
}