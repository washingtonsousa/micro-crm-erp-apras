<?php
namespace App\Core\Domain\Abstraction\Interface;


use App\Core\Domain\Entity\Usuario;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use App\Core\Domain\Abstraction\Interface\IPaginatedRepository;

interface IUsuarioRepository extends UserLoaderInterface, IPaginatedRepository  {

/**
 * @return Usuario
 */
public function getById($id) : Usuario;

/**
 * @return Usuario
 */
public function insert(Usuario $user);


/**
 * @return bool
 */
public function checkIfExists(string $documento, string $email);

}
