<?php
namespace App\Core\Domain\Abstraction\Interface;

use App\Core\Domain\Entity\User;

interface IUserInterface {

            public function Subscribe(User $user);
            public function Auth(User $user);


}