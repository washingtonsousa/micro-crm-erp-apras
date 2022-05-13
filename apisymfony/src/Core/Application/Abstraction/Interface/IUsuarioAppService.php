<?php
namespace App\Core\Application\Abstraction\Interface;

use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;;
use App\Core\Application\ViewModel\UsuarioViewModel;

interface IUsuarioAppService {
        public function getUsuarioById(int $id) : ?UsuarioViewModel;
        public function update(UsuarioViewModel $usuario, $id, $changeSenha = false) : ?UsuarioViewModel;
        public function partialUpdate(UsuarioViewModel $usuario) : ?UsuarioViewModel;
        public function register(UsuarioViewModel $userViewModel) : ?UsuarioViewModel;
        public function getUsers(PaginatedEntityRequestViewModel $paramsModel) : PaginationAggregatorViewModel;
        public function remove($id) : bool;
}
