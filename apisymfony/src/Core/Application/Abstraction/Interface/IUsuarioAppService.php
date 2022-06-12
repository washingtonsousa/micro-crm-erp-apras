<?php
namespace App\Core\Application\Abstraction\Interface;

use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\ViewModel\Request\UsuarioChangeSenhaRequestViewModel;

;
use App\Core\Application\ViewModel\UsuarioViewModel;

interface IUsuarioAppService {

        public function getById(int $id) : ?UsuarioViewModel;
        public function update(UsuarioViewModel $usuario, $id, $changeSenha = false) : ?UsuarioViewModel;
        public function partialUpdate(UsuarioChangeSenhaRequestViewModel $usuario) : ?UsuarioViewModel;
        public function register(UsuarioViewModel $userViewModel) : ?UsuarioViewModel;
        public function get(PaginatedEntityRequestViewModel $paramsModel) : PaginationAggregatorViewModel;
        public function remove($id) : bool;
        
}
