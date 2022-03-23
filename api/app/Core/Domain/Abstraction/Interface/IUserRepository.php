<?php
namespace App\Core\Domain\Abstraction\Interface;

use App\Core\Domain\Entity\UserEntity;

interface IUserRepository {

/**
 * @return UserEntity[]
 */
public function get() : iterable;
/**
 * @return UserEntity
 */
public function getById($id) : UserEntity;

/**
 * @return UserEntity
 */
public function insert(UserEntity $user);


}
