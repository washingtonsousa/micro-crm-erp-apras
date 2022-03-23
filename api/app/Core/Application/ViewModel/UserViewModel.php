<?php
namespace  App\Core\Application\ViewModel;

use App\Core\Application\Abstraction\ViewModel\EntityViewModel;
use App\Core\Domain\Entity\UserEntity;
use ReflectionClass;
use ReflectionProperty;

class UserViewModel extends EntityViewModel {

    public $name;
    public $email;
    public $password;

    public function ToDomainModel() : UserEntity {

            $instance = new UserEntity();
            $instance->setName($this->name);
            $instance->setPassword(bcrypt($this->password));
            $instance->setEmail($this->email);
            return $instance;

    }

}
