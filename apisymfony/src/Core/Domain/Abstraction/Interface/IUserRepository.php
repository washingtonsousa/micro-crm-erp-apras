<?php
namespace App\Core\Domain\Abstraction\Interface;

use App\Core\Domain\Entity\User;

interface IUserRepository {

/**
 * @return User[]
 */
public function get() : iterable;
/**
 * @return User
 */
public function getById($id) : User;

/**
 * @return User
 */
public function insert(User $user);


}
