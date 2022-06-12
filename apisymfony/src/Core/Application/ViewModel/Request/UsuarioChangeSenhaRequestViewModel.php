<?php
namespace App\Core\Application\ViewModel\Request;

use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use QueryFilter;

class UsuarioChangeSenhaRequestViewModel  {

    public string $password;
    public string $oldPassword;

}