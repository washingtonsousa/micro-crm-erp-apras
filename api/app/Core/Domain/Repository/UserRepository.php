<?php
namespace App\Core\Domain\Repository;

use App\Core\Data\Model\User;
use App\Core\Domain\Abstraction\Interface\IUserRepository;
use App\Core\Domain\Entity\UserEntity;

class UserRepository implements IUserRepository {


            public function get() : iterable {
                return User::all();
            }

            public function getById($id) : UserEntity {
                return User::find($id);
            }

            public function insert(UserEntity $user) {

               return User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => $user->getPassword()
                ]);
            }

}
