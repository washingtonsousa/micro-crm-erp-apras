<?php
namespace App\Core\Application\Abstraction\Interface;

use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;

interface IUsuarioAppService {

        public function register(UsuarioViewModel $userViewModel);
        public function getUsers() : PaginationAggregator;
}
