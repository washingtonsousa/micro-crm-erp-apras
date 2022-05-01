<?php
namespace App\Core\Domain\Abstraction\Interface;

use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetUsuarioPaginatedEntityQuery;
use App\Core\Domain\Entity\Usuario;

interface IUsuarioService {

            public function Subscribe(Usuario $user);
            public function GetUsers(GetUsuarioPaginatedEntityQuery $paginatedQuery) : PaginationAggregator;

}