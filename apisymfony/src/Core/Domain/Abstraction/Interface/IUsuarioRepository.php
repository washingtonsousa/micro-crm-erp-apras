<?php
namespace App\Core\Domain\Abstraction\Interface;

use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\Usuario;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;

interface IUsuarioRepository extends UserLoaderInterface {

/**
 * @return PaginationAggregator
 */
public function get(iterable $filters, $pageSize, $page) : PaginationAggregator;
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
