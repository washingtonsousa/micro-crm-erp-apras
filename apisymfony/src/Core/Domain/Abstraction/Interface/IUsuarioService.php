<?php
namespace App\Core\Domain\Abstraction\Interface;

use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\Usuario;

interface IUsuarioService {

            public function Subscribe(Usuario $user);
            public function GetUsers() : PaginationAggregator;

}