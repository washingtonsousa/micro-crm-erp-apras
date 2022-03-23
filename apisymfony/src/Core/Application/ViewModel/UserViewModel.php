<?php
namespace  App\Core\Application\ViewModel;

use App\Core\Application\Abstraction\ViewModel\EntityViewModel;
use App\Core\Domain\Entity\User;
use DateTime;

class UserViewModel extends EntityViewModel {

    public $name;
    public $email;
    public $password;
    public $document;  
    public $gender;
    public $birthday;

    public function ToDomainModel() : User {

            $user = new User();
            $user->setPassword($this->password);
            $user->setEmail($this->email);
            $user->setName($this->name);
            $user->setIdAccessLevel('ROLE_ADMIN');
            $user->setBirthday($this->birthday);
            $user->setDocument($this->document);
            $user->setGender($this->gender);
            $user->setStatus(true);
            return $user;

    }

}
