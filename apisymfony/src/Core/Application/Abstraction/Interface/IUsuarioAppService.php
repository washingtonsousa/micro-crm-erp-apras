<?php
namespace App\Core\Application\Abstraction\Interface;

use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\ViewModel\Pagination\UsuarioPaginationResponseViewModel;
use App\Core\Application\ViewModel\Request\UsuarioGetRequestViewModel;
use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;

interface IUsuarioAppService {
        public function update(UsuarioViewModel $usuario) : UsuarioViewModel;
        public function partialUpdate(UsuarioViewModel $usuario) : UsuarioViewModel;
        public function register(UsuarioViewModel $userViewModel);
        public function getUsers(PaginatedEntityRequestViewModel $paramsModel) : UsuarioPaginationResponseViewModel;
}
