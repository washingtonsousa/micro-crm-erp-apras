<?php
namespace  App\Core\Application\ViewModel;

use App\Core\Application\Abstraction\ViewModel\EntityViewModel;
use App\Core\Domain\Entity\User;

class UserViewModel extends EntityViewModel {

    public $name;
    public $email;
    public $password;

    public function ToDomainModel() : User {

            $instance = new User();
            return $instance;

    }

}
