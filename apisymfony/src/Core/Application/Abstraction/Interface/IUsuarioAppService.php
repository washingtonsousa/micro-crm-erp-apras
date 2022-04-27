<?php
namespace App\Core\Application\Abstraction\Interface;

use App\Core\Application\ViewModel\UsuarioViewModel;

interface IUsuarioAppService {

        public function register(UsuarioViewModel $userViewModel);
        public function getUsers() : iterable;
}
