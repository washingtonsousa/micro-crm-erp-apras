<?php
namespace App\Core\Application\Abstraction\Interface\Service;

use App\Core\Application\ViewModel\UsuarioViewModel;

interface IUsuarioAppService {

        public function register(UsuarioViewModel $userViewModel);
}
