<?php
namespace App\Core\Application\Abstraction\Interface\Service;

use App\Core\Application\ViewModel\UserViewModel;

interface IUserAppService {

        public function register(UserViewModel $userViewModel);
        public function login();
}
