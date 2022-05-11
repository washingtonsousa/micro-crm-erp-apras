<?php
namespace App\Core\Domain\Abstraction\Interface;

use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetUsuarioPaginatedEntityQuery;
use App\Core\Domain\Entity\Usuario;

interface IUsuarioService {

            public function update(Usuario $user);
            public function subscribe(Usuario $user);
            public function getUsuarioById(int $id) : ?Usuario;
            public function getUsers(GetUsuarioPaginatedEntityQuery $paginatedQuery) : PaginationAggregator;
            public function getCurrentLoggedInUser() : ?Usuario;
}