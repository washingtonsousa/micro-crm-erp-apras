<?php
namespace App\Core\Domain\Abstraction\Interface;

use App\Core\Domain\Entity\Usuario;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;

interface IUsuarioRepository extends UserLoaderInterface {

/**
 * @return Usuario[]
 */
public function get() : iterable;
/**
 * @return Usuario
 */
public function getById($id) : Usuario;

/**
 * @return Usuario
 */
public function insert(Usuario $user);


}